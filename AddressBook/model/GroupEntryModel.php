<?php

require_once('BaseModel.php');

/**
* Manipulate group_entry table data.
*
* @author    Nhat Nguyen <minhnhat2006@gmail.com>
* @since   Feb-26-2016
*/
class GroupEntryModel extends BaseModel {

    // Name of table: group_entry
    protected $_tableName = 'group_entry';
    // Name of table's primary key: group_entry_id
    protected $_primaryKey = 'group_entry_id';

    /**
    * Check whether an entry was added to one specific group
    *
    * @param number $group_id Group id
    * @param number $entry_id Entry id
    * @return null if error orcurred, return true if entry was added to group before, otherwise return false.
    */
    public function isEntryAddedToGroup($group_id, $entry_id) {
        $connection = $this->connect();

        if (!$connection) {
            return null;
        }

        try {
            $sql = "SELECT COUNT(*) AS count FROM `group_entry` WHERE `group_id` = $group_id AND `entry_id` = $entry_id";

            $query = $connection->prepare($sql); 
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'] > 0;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}