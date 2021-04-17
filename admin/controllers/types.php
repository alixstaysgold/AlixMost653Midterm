<?php 
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);

switch($action){
    case "manage_types":
        $types = get_types();
        include('./view/type_list.php');
        break;
    case "add_type":
        add_type($type_name);
        header("Location: .?action=manage_types");
        break;
    case "delete_type":
        if ($type_id) {
            try {
                delete_type($type_id);
            } 
            catch (PDOException $e) {
                $error = "Type still in use.";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_types");
        break;
}