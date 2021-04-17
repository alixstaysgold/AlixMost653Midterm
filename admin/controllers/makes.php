<?php 
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
switch($action){
case "manage_makes":
    $makes = get_makes();
    include('./view/make_list.php');
    break;
case "add_make":
    add_make($make_name);
    header("Location: .?action=manage_makes");
    break;
case "delete_make":
    if($make_id) {
        try{
            delete_make($make_id);
        }
        catch (PDOException $e){
            $error = "Vehicle still in inventory.";
            include('./view/error.php');
            exit();
        }
    }
    header("Location: .?action=manage_makes");
    break; }