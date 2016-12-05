<?php

/**
* Base class for all models.
*
* @author    Nhat Nguyen <minhnhat2006@gmail.com>
* @since   Feb-17-2016
*/
abstract class BaseModel {

    // Name of table
    protected $_tableName;
    // Name of table's primary key
    protected $_primaryKey;
    // mysql connection
    private static $_connection;

    /**
    * Create one connection to mysql server.
    *
    * @return false if error orcurred, otherwise return connection
    */
    public function connect() {

        if (!isset(self::$_connection)) {

            require_once('/../config/db.config.php');

            try {
                self::$_connection = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {

                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        return self::$_connection;
    }

    /**
    * Get all records of current table.
    *
    * @return false if error orcurred, otherwise return all records as array
    */
    public function findAll() {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $query = $connection->prepare("SELECT * FROM " . $this->_tableName); 
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
    * Get one record with matched id.
    *
    * @param string $id Primary key value
    * @return false if error orcurred, otherwise return matched record.
    */
    public function findOne($id) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        try {
            $query = $connection->prepare("SELECT * FROM " . $this->_tableName . " WHERE " . $this->_primaryKey . "=:id"); 
            $query->execute(['id' => $id]);

            $result = $query->fetch();

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
    * Insert new record into table.
    *
    * @param array    $keyValues Array of field-value pairs.
    *
    * @return false if error orcurred, otherwise return number of record inserted.
    */
    public function insert(array $keyValues = []) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        $fields = [];
        $fieldMarks = [];

        foreach ($keyValues as $field => $value) {
            $fields[] = $field;
            $fieldMarks[] = ":$field";
        }

        $fieldsImploded = implode(',', $fields);
        $fieldMarksImploded = implode(',', $fieldMarks);

        try {
            $query = $connection->prepare("INSERT INTO $this->_tableName ($fieldsImploded) VALUES ($fieldMarksImploded)"); 

            foreach ($keyValues as $field => $value) {
                $query->bindValue(":$field", $value);
            }

            $result = $query->execute();

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
    * Insert new record into table.
    *
    * @param string $id Primary key value
    * @param array    $keyValues Array of field-value pairs.
    *
    * @return false if error orcurred, otherwise return number of record updated.
    */
    public function update($id, array $keyValues = []) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

         $setFieldMarks = [];

        foreach ($keyValues as $field => $value) {
            $setFieldMarks[] = "`$field`=:$field";
        }

        $setFieldMarksImploded = implode(',', $setFieldMarks);

        try {
            $query = $connection->prepare("UPDATE $this->_tableName SET $setFieldMarksImploded WHERE $this->_primaryKey=:id");

            $query->bindValue(":id", $id);

            foreach ($keyValues as $field => $value) {
                $query->bindValue(":$field", $value);
            }

            $result = $query->execute();

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
    * Delete record from table.
    *
    * @param array    $keyValues Array of field-value pairs that used to search records for deleting.
    *
    * @return false if error orcurred, otherwise return number of record updated.
    */
    public function delete(array $keyValues = []) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        $checkedFieldMarks = [];

        foreach ($keyValues as $field => $value) {
            $checkedFieldMarks[] = "`$field`=:$field";
        }

        $checkedFieldMarksImploded = implode(' AND ', $checkedFieldMarks);

        try {
            $query = $connection->prepare("DELETE FROM $this->_tableName WHERE $checkedFieldMarksImploded");

            foreach ($keyValues as $field => $value) {
                $query->bindValue(":$field", $value);
            }

            $result = $query->execute();

            return $result;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
    * Execute insert/update/delete query
    *
    * @param string   $sql Sql query
    * @param array    $params Array of field-value pairs that used to search records for deleting.
    *
    * @return false if error orcurred, otherwise return number of record effected.
    */
    public function execute($sql, array $params = []) {
        $connection = $this->connect();

        if (!$connection) {
            return false;
        }

        $query = $connection->prepare($sql); 
        $result = $query->execute($params);

        return $result;
    }
}