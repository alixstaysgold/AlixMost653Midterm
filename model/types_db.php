<?php

function get_types(){
    global $db;
    $query = 'SELECT * FROM types ORDER BY type_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_type_name($type_id){
    global $db;
    $query = 'SELECT * FROM types
              WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $type = $statement->fetchAll();
    $statement->closeCursor();
    return $type;
}

function add_type($type_name){
    global $db;
    $query = 'INSERT INTO types
                (Type)
              VALUES
                (:type_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_name', $type_name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($type_id){
    global $db;
    $query = 'DELETE FROM types
              WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}



?>