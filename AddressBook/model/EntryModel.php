<?php

require_once('BaseModel.php');

/**
* Manipulate Entry table data.
*
* @author    Nhat Nguyen <minhnhat2006@gmail.com>
* @since   Feb-17-2016
*/
class EntryModel extends BaseModel {

    // Name of table: entry
    protected $_tableName = 'entry';
    // Name of table's primary key: entry_id
    protected $_primaryKey = 'entry_id';

    /**
    * Gett all entries belong to one Group.
    * Entries are fetched from 2 sources: Entries added directly to Group (table group_entry), 
    * and Entries from parent groups (table group_connector).
    *
    * @param number $group_id Group id
    * @return false if error orcurred, otherwise return all records as array
    */
    public function findByGroup($group_id) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $sql = "SELECT DISTINCT `entry`.`entry_id`, `entry`.`name`, `entry`.`first_name`, `entry`.`street`, `entry`.`zip_code`, `entry`.`city_id`, MIN(`entry`.`is_inherited`) AS 'is_inherited'
                FROM
                    (SELECT `entry`.*, 0 AS 'is_inherited'
                    FROM `entry` INNER JOIN `group_entry` ON `entry`.`entry_id` = `group_entry`.`entry_id`
                    WHERE `group_entry`.`group_id` = $group_id
                    UNION

                    SELECT DISTINCT `entry`.*, 1 AS 'is_inherited'
                    FROM `entry` INNER JOIN `group_entry` ON `entry`.`entry_id` = `group_entry`.`entry_id`
                         INNER JOIN `group_connector` ON `group_entry`.`group_id` = `group_connector`.`parent_group_id`
                    WHERE `group_connector`.`child_group_id` = $group_id) AS `entry`
                GROUP BY `entry`.`entry_id`
                ORDER BY `entry`.`is_inherited`, `entry`.`entry_id`
                ";

            $query = $connection->prepare($sql); 
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
    * Find all entries by name matched with search term
    *
    * @param string $search Term to search
    * @return false if error orcurred, otherwise return all records as array
    */
    public function findByName($search) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $sql = "SELECT * FROM `entry` WHERE `name` LIKE :search";

            $query = $connection->prepare($sql); 
            $query->execute(['search' => "%$search%"]);

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}