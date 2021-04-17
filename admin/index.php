<?php 
require ('../model/database.php');
require ('../model/vehicles_db.php');
require ('../model/makes_db.php');
require ('../model/types_db.php');
require ('../model/classes_db.php');
require ('../model/admin_db.php');



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

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
if(!$class_name)
{
    $class_name = filter_input(INPUT_GET, 'class_name', FILTER_SANITIZE_STRING);
}

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);

$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);

$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

if($action == "search_cars" || $action == "add_vehicle_page" || $action == "delete_vehicle" || $action == "add_vehicle") {
    include('controllers/vehicles.php');
}

else if($action == "delete_type" || $action == "add_type" || $action == "manage_types") {
    include('controllers/types.php');
}

else if ($action == "manage_makes" || $action ==  "add_make" || $action ==  "delete_make") {
    include('controllers/makes.php');
} 

else if ($action ==  "add_class" || $action ==  "delete_class" || $action == "manage_classes") {
    include('controllers/classes.php');
}

else if ($action == "login" || $action == "show_login" || $action == "register" || $action == "show_register" || $action = "logout"){
    include('controllers/admin.php');
}

else{
    $vehicles = get_vehicles_by_class($class_id, $order);
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('./view/vehicle_list.php');
}










