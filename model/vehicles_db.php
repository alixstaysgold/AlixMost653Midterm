<?php

class vehicleDB{
public static function get_vehicles_by_make($make_id, $order){
    if ($order == "year"){
    $db = Database::getDB();
    $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, types.type, classes.class, makes.make FROM vehicles 
    INNER JOIN types
    ON vehicles.type_id = types.type_id
    INNER JOIN classes
    ON vehicles.class_id = classes.class_id
    INNER JOIN makes
    ON vehicles.make_id = makes.make_id
    WHERE vehicles.make_id = :make_id
    ORDER BY vehicles.year DESC';
    $statement = $db->prepare($query);
    if ($make_id) {
        $statement->bindValue(':make_id', $make_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

    else {
    $db = Database::getDB();
    $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, types.type, classes.class, makes.make FROM vehicles 
    INNER JOIN types
    ON vehicles.type_id = types.type_id
    INNER JOIN classes
    ON vehicles.class_id = classes.class_id
    INNER JOIN makes
    ON vehicles.make_id = makes.make_id
    WHERE vehicles.make_id = :make_id
    ORDER BY vehicles.price DESC';
    $statement = $db->prepare($query);
    if ($make_id) {
        $statement->bindValue(':make_id', $make_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchALL();
    $statement->closeCursor();
    return $vehicles;
}
}

public static function get_vehicles_by_type($type_id, $order){
    $db = Database::getDB();
    if($type_id){
        if ($order == "year"){
            $query ='SELECT vehicles.vehicle_id, vehicles.year, makes.make, vehicles.model, types.type, classes.class, vehicles.price FROM vehicles 
            LEFT JOIN makes ON vehicles.make_id = makes.make_id
            LEFT JOIN classes ON vehicles.class_id = classes.class_id
            LEFT JOIN types ON vehicles.type_id = types.type_id
            WHERE vehicles.type_id = :type_id
            ORDER BY vehicles.year DESC';
            $statement = $db->prepare($query);
            if ($type_id) {
                $statement->bindValue(':type_id', $type_id);
            }
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $vehicles;
        }
        else{
            $query = 'SELECT v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN makes m ON v.make_id = m.make_id
            LEFT JOIN classes c ON v.class_id = c.class_id
            LEFT JOIN types t ON v.type_id = t.type_id
            WHERE v.type_id = :type_id
            ORDER BY v.price DESC';
            $statement = $db->prepare($query);
            if ($type_id) {
                $statement->bindValue(':type_id', $type_id);
            }
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $vehicles;
        }
    }
}


public static function get_vehicles_by_class($class_id, $order)
{
    $db = Database::getDB();
    if($class_id)
    {
        if ($order == "year") {
            $query =
                'SELECT v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN makes m ON v.make_id = m.make_id
            LEFT JOIN classes c ON v.class_id = c.class_id
            LEFT JOIN types t ON v.type_id = t.type_id
            WHERE v.class_id = :class_id
            ORDER BY v.year DESC';

            $statement = $db->prepare($query);
            if ($class_id) {
                $statement->bindValue(':class_id', $class_id);
            }
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $vehicles;
        } else {
            $query = 'SELECT v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
        LEFT JOIN makes m ON v.make_id = m.make_id
        LEFT JOIN classes c ON v.class_id = c.class_id
        LEFT JOIN types t ON v.type_id = t.type_id
        WHERE v.class_id = :class_id
        ORDER BY v.price DESC';

            $statement = $db->prepare($query);
            if ($class_id) {
                $statement->bindValue(':class_id', $class_id);
            }
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $vehicles;
        }
    }
    else
    {
        if ($order == "year") {
            $query =
                'SELECT v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN makes m ON v.make_id = m.make_id
            LEFT JOIN classes c ON v.class_id = c.class_id
            LEFT JOIN types t ON v.type_id = t.type_id
            ORDER BY v.year DESC';
            $statement = $db->prepare($query);
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $vehicles;
        } else {
            $query = 'SELECT v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN makes m ON v.make_id = m.make_id
            LEFT JOIN classes c ON v.class_id = c.class_id
            LEFT JOIN types t ON v.type_id = t.type_id
            ORDER BY v.price DESC';
            $statement = $db->prepare($query);
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $vehicles;
        }
    }
    
}


    

public static function add_vehicle($year, $price, $type_id, $class_id, $make_id, $model){
    $db = Database::getDB();
    $query = 'INSERT INTO vehicles
                (year, price, type_id, class_id, make_id, model)
              VALUES
                (:year, :price, :type_id, :class_id, :make_id, :model)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':model', $model);
    $statement->execute();
    $statement->closeCursor();
}

public static function delete_vehicle($vehicle_id){
    $db = Database::getDB();
    $query = 'DELETE FROM vehicles
              WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

}