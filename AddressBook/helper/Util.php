<?php

/**
* Common util functions.
*
* @author    Nhat Nguyen <minhnhat2006@gmail.com>
* @created   Feb-17-2016
*/
class Util {

    /**
    * Convert list of entities to xml string.
    *
    * @param array    $entities    Array of entities
    * @param string   $entityName  Name of entity
    * @param array    $fields      Array of field will be used for converting
    * @return text represented entities as xml format
    *
    */
    public static function entitiesToXml(array $entities, $entityName, array $fields = []) {
        $xml = new SimpleXMLElement('<xml/>');

        foreach ($entities as $entity) {

            $entityNode = $xml->addChild($entityName);

            foreach ($fields as $field) {

                if (isset($entity[$field])) {
                    $entityNode->addChild($field, $entity[$field]);
                }
            }
        }

        return $xml->asXML();
    }

}