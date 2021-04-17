<?php 
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);

switch($action){
case "add_vehicle":
    if($year && $price && $type_id && $class_id && $make_id && $model){
        add_vehicle($year, $price, $type_id, $class_id, $make_id, $model);
    }
    else{
        $error = "Please check all fields";
        include('./view/error.php');
        exit();
    }
    header("Location: .?action=default");
    break;
case "add_vehicle_page":
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('./view/add_vehicle.php');
    break;
case "delete_vehicle":
    if($vehicle_id){
        try{
            delete_vehicle($vehicle_id);
        }
        catch (PDOException $e){
            $error = "Please specify Vehicle";
            include('./view/error.php');
        }
        header("Location: .?");
    }
    break;

    case "search_cars":
        if ($make_id){
            $vehicles = get_vehicles_by_make($make_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include ('./view/vehicle_list.php');
            break;
        }
        else if (!$make_id && $type_id){
            $vehicles = get_vehicles_by_type($type_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include ('./view/vehicle_list.php');
            break;
        }
        else if (!$make_id && !$type_id && $class_id){
            $vehicles = get_vehicles_by_class($class_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include ('./view/vehicle_list.php');
            break;
        }
        else {
            $vehicles = get_vehicles_by_class($class_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include ('./view/vehicle_list.php');
            break;
        } }