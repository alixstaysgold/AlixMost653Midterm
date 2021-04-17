<?php
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);

switch($action){
    case "manage_classes":
        $classes = get_classes();
        include('./view/class_list.php');
        break;
    case "add_class":
        add_class($class_name);
        header("Location: .?action=manage_classes");
        break;
    case "delete_class":
        if ($class_id) {
            try {
                delete_class($class_id);
            } 
            catch (PDOException $e) {
                $error = "Class still in use";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_classes");
        break;
}