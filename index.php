<?php 
require ('model/database.php');
require ('model/vehicles_db.php');
require ('model/makes_db.php');
require ('model/types_db.php');
require ('model/classes_db.php');

$lifetime= 60*60*24*14;
session_set_cookie_params($lifetime, '/');
session_start();

$firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
if(!$firstname){
    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);}

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
        $action = 'default';
    }
}

$order = filter_input(INPUT_POST, 'order', FILTER_SANITIZE_STRING);
if(!$order){
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_STRING);
}

 

if (isset($firstname)){
    $_SESSION['userid'] = $firstname;
}



switch ($action){
    case "search_cars":
        if ($make_id){
            $vehicles = get_vehicles_by_make($make_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicles_main.php');
            break;
        }
        else if (!$make_id && $type_id){
            $vehicles = get_vehicles_by_type($type_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicles_main.php');
            break;
        }
        else if (!$make_id && !$type_id && $class_id){
            $vehicles = get_vehicles_by_class($class_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicles_main.php');
            break;
        }
        else {
            $vehicles = get_vehicles_by_class($class_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicles_main.php');
            break;
        }


    case "register":
        include('view/register.php');   
        break;

    case "logout":
        include('view/logout.php');
        break;

    default:
        $vehicles = get_vehicles_by_class($class_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include ('view/vehicles_main.php'); 
        break;

        
}
    

?>







