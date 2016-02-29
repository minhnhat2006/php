<?php

require_once('BaseModel.php');

/**
* Manipulate Group table data.
*
* @author    Nhat Nguyen <minhnhat2006@gmail.com>
* @since   Feb-26-2016
*/
class GroupModel extends BaseModel {

    // Name of table: group
    protected $_tableName = '`group`';
    // Name of table's primary key: group_id
    protected $_primaryKey = 'group_id';

    /**
    * Find all parent groups of one specific group.
    *
    * @param number $group_id Group id
    * @return false if error orcurred, otherwise return all records as array
    */
    public function findParentGroupsByGroupId($group_id) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $sql = "SELECT DISTINCT `group`.*, MIN(`group_connector`.`is_inherited`) AS `is_inherited`
                FROM `group` INNER JOIN `group_connector` ON `group`.`group_id` = `group_connector`.`parent_group_id`
                WHERE `child_group_id` = :group_id
                GROUP BY `group`.`group_id` 
                ORDER BY `is_inherited`"; // we GROUP BY here to avoid duplicated records

            $query = $connection->prepare($sql); 
            $query->execute(['group_id' => $group_id]);

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
    * Find all child groups of one specific group.
    *
    * @param number $group_id Group id
    * @return false if error orcurred, otherwise return all records as array
    */
    public function findChildGroupsByGroupId($group_id) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $sql = "SELECT DISTINCT `group`.*, MIN(`group_connector`.`is_inherited`) AS `is_inherited`
                FROM `group` INNER JOIN `group_connector` ON `group`.`group_id` = `group_connector`.`child_group_id`
                WHERE `parent_group_id` = :group_id
                GROUP BY `group`.`group_id` 
                ORDER BY `is_inherited`"; // we GROUP BY here to avoid duplicated records

            $query = $connection->prepare($sql); 
            $query->execute(['group_id' => $group_id]);

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}