<?php

/**
* Manipulate group_connector table data.
*
* @author    Nhat Nguyen <minhnhat2006@gmail.com>
* @since   Feb-26-2016
*/
class GroupConnectorModel extends BaseModel {

    // Name of table: group_connector
    protected $_tableName = 'group_connector';
    // Name of table's primary key: group_connector_id
    protected $_primaryKey = 'group_connector_id';

    /**
    * Adding one new Group connection.
    * Steps to add group connection:
    * 1. Add one new record to table group_connector to indicate that child_group_id inherited directly from parent_group_id
    * 2. Find out all parent groups of parent_group_id
    * 3. Find out all child groups of child_group_id
    * 4. Add new records to table group_connector to indicate that groups step 3 + child_group_id inherited indirectly from groups step 2 + parent_group_id
    * 5. Add new records to table group_connector_path to store path of each indirect group connection
    *
    * @param number $parent_group_id Parent group id
    * @param number $child_group_id Child group id
    *
    * @return false if error orcurred or not successed, otherwise return true.
    */
    public function addGroupConnection($parent_group_id, $child_group_id) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $connection->beginTransaction();

            // Add one new record to table group_connector to indicate that child_group_id inherited directly from parent_group_id
            $group_connector = ['parent_group_id' => $parent_group_id, 'child_group_id' => $child_group_id, 'is_inherited' => 0];
            $result = $this->insert($group_connector);

            if (!$result) {
                $connection->rollBack();
                return false;
            }


            // Find out all parent groups of parent_group_id
            $sql_parent_groups = "SELECT * FROM `$this->_tableName` WHERE `child_group_id` = :parent_group_id";
            $query_parent_groups = $connection->prepare($sql_parent_groups); 
            $query_parent_groups->execute(['parent_group_id' => $parent_group_id]);
            $parent_groups = $query_parent_groups->fetchAll(PDO::FETCH_ASSOC);
            $parent_groups[] = ['parent_group_id' => $parent_group_id];

            // Find out all child groups of child_group_id
            $sql_child_groups = "SELECT * FROM `$this->_tableName` WHERE `parent_group_id` = :child_group_id";
            $query_child_groups = $connection->prepare($sql_child_groups); 
            $query_child_groups->execute(['child_group_id' => $child_group_id]);
            $child_groups = $query_child_groups->fetchAll(PDO::FETCH_ASSOC);
            $child_groups[] = ['child_group_id' => $child_group_id];

            foreach ($parent_groups as $parent_group) {
                foreach ($child_groups as $child_group) {
                    // Add new records to table group_connector to indicate that groups step 3 + child_group_id inherited indirectly from groups step 2 + parent_group_id, and add new records to table group_connector_path to store path of each indirect group connection
                    $this->addIndirectGroupConnection($parent_group, $child_group, $parent_group_id, $child_group_id);
                }
            }

            $connection->commit();

            return true;

        } catch(PDOException $e) {

            $connection->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    /** 
    * Add new records to table group_connector to indicate that groups step 3 + child_group_id inherited indirectly from groups step 2 + parent_group_id
    * Add new records to table group_connector_path to store path of each indirect group connection
    *
    * @param array $parent_group Parent group connector
    * @param array $child_group Child group connetor
    * @param number $parent_group_id Parent group id
    * @param number $child_group_id Child group id
    *
    * @return false if error orcurred or not successed, otherwise return true.
    */
    private function addIndirectGroupConnection($parent_group, $child_group, $parent_group_id, $child_group_id) {
        $connection = $this->connect();

        // Ignore ($parent_group_id, $child_group_id) pair
        if (!isset($parent_group['group_connector_id']) && !isset($child_group['group_connector_id'])) {
            return true;
        }

        // Add new records to table group_connector to indicate that groups step 3 + child_group_id inherited indirectly from groups step 2 + parent_group_id
        $sql_insert_group_connector = "INSERT INTO `$this->_tableName`(`parent_group_id`, `child_group_id`, `is_inherited`) VALUES (:parent_group_id, :child_group_id, 1)";
        $this->execute($sql_insert_group_connector, [
            'child_group_id' => $child_group['child_group_id'],
            'parent_group_id' => $parent_group['parent_group_id']]);

        $last_group_connector_id = $connection->lastInsertId();

        // Add new records to table group_connector_path to store path of each indirect connected group
        // For $parent_group
        if (isset($parent_group['is_inherited'])) {

            if ($parent_group['is_inherited'] == 1) {
                // Path retrieved from $parent_group
                $sql_insert_group_connector_path_old = "INSERT INTO `group_connector_path`(`group_connector_id`, `parent_group_id`, `child_group_id`)
                    SELECT :group_connector_id AS `group_connector_id`, `parent_group_id`, `child_group_id`
                    FROM `group_connector_path`
                    WHERE `group_connector_id` = :parent_group_connector_id";

                $this->execute($sql_insert_group_connector_path_old , [
                    'group_connector_id' => $last_group_connector_id,
                    'parent_group_connector_id' => $parent_group['group_connector_id']]);
            } else {

                // Path from $parent_group->parent_group_id to $parent_group->child_group_id
                $sql_insert_group_connector_path = "INSERT INTO `group_connector_path`(`group_connector_id`, `parent_group_id`, `child_group_id`) VALUES (:group_connector_id, :parent_group_id, :child_group_id)";

                $this->execute($sql_insert_group_connector_path, [
                    'group_connector_id' => $last_group_connector_id,
                    'parent_group_id' => $parent_group['parent_group_id'],
                    'child_group_id' => $parent_group['child_group_id']]);
            }
        }

        // For $child_group
        if (isset($child_group['is_inherited'])) {

            if ($child_group['is_inherited'] == 1) {
                // Path retrieved from $child_group
                $sql_insert_group_connector_path_old = "INSERT INTO `group_connector_path`(`group_connector_id`, `parent_group_id`, `child_group_id`)
                    SELECT :group_connector_id AS `group_connector_id`, `parent_group_id`, `child_group_id`
                    FROM `group_connector_path`
                    WHERE `group_connector_id` = :child_group_connector_id";

                $this->execute($sql_insert_group_connector_path_old, [
                    'group_connector_id' => $last_group_connector_id,
                    'child_group_connector_id' => $child_group['group_connector_id']]);
            } else {

                // Path from $child_group->parent_group_id to $child_group->child_group_id
                $sql_insert_group_connector_path = "INSERT INTO `group_connector_path`(`group_connector_id`, `parent_group_id`, `child_group_id`) VALUES (:group_connector_id, :parent_group_id, :child_group_id)";

                $this->execute($sql_insert_group_connector_path, [
                    'group_connector_id' => $last_group_connector_id,
                    'parent_group_id' => $child_group['parent_group_id'],
                    'child_group_id' => $child_group['child_group_id']]);
            }
        }

        // Path from $parent_group_id to $child_group_id
        $sql_insert_group_connector_path_new = "INSERT INTO `group_connector_path`(`group_connector_id`, `parent_group_id`, `child_group_id`) VALUES ($last_group_connector_id, :parent_group_id, :child_group_id)";
        $this->execute($sql_insert_group_connector_path_new, [
            'parent_group_id' => $parent_group_id,
            'child_group_id' => $child_group_id]);
    }

    /**
    * Remove one Group connection.
    * Steps to remove group connection:
    * 1. Remove record that has `is_inherited`=0 from table group_connector
    * 2. Find out all indirect group connections from table group_connector
    * 3. Remove all indirect group connections from table group_connector, and matched records from table group_connector_path
    *
    * @param number $parent_group_id Parent Group id
    * @param number $child_group_id Child Group id
    *
    * @return false if error orcurred or not successed, otherwise return true.
    */
    public function removeGroupConnection($parent_group_id, $child_group_id) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $connection->beginTransaction();

            // Remove record that has `is_inherited`=0 from table group_connector
            $group_connector = ['parent_group_id' => $parent_group_id, 'child_group_id' => $child_group_id, 'is_inherited' => 0];
            $result = $this->delete($group_connector);

            if (!$result) {
                $connection->rollBack();
                return false;
            }

            // Find out all indirect group connections from table group_connector
            $sql_indrect_group_connectors = "SELECT `group_connector`.`group_connector_id`
                FROM `group_connector` INNER JOIN `group_connector_path` ON `group_connector`.`group_connector_id` = `group_connector_path`.`group_connector_id`
                WHERE `group_connector_path`.`parent_group_id` = :parent_group_id AND `group_connector_path`.`child_group_id` = :child_group_id AND `is_inherited` = 1";
            $query_indrect_group_connectors = $connection->prepare($sql_indrect_group_connectors); 
            $query_indrect_group_connectors->execute([
                'child_group_id' => $child_group_id,
                'parent_group_id' => $parent_group_id]);
            $indrect_group_connectors = $query_indrect_group_connectors->fetchAll(PDO::FETCH_ASSOC);

            $indrect_group_connector_ids = [];

            foreach ($indrect_group_connectors as $indrect_group_connector) {
                $indrect_group_connector_ids[] = $indrect_group_connector['group_connector_id'];
            }

            // Remove all indirect group connections from table group_connector, and matched records from table group_connector_path
            if (!empty($indrect_group_connector_ids)) {
                $str_indrect_group_connector_ids = implode(',', $indrect_group_connector_ids);
                
                // Remove records from table group_connector_path
                $sql_delete_group_connector_paths = "DELETE FROM `group_connector_path` WHERE `group_connector_id` IN ($str_indrect_group_connector_ids)";
                $this->execute($sql_delete_group_connector_paths);

                // Remove records from table group_connector
                $sql_delete_group_connectors = "DELETE FROM `group_connector` WHERE `group_connector_id` IN ($str_indrect_group_connector_ids)";
                $this->execute($sql_delete_group_connectors);
            }

            $connection->commit();

            return true;

        } catch(PDOException $e) {

            $connection->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    /**
    * Check whether a group was already inherited from one specific group
    *
    * @param number $parent_group_id Parent Group id to check
    * @param number $child_group_id Child Group id to check
    * @return null if error orcurred, return true if child group was already inherited parent group before, otherwise return false.
    */
    public function isGroupInheritedFromGroup($parent_group_id, $child_group_id) {
        $connection = $this->connect();

        if (!$connection) {
            return null;
        }

        try {
            $sql = "SELECT COUNT(*) AS count FROM `$this->_tableName` WHERE `parent_group_id` = $parent_group_id AND `child_group_id` = $child_group_id AND `is_inherited` = 0";

            $query = $connection->prepare($sql); 
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'] > 0;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}