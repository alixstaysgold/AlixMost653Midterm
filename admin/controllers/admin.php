<!-- login, show_login, register, show_register, and logout actions -->

<?php
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);


switch($action){
    case "login":
        echo '<script>alert("log")</script>';   
        if(is_valid_admin_login($username, $password))
        {
            $_SESSION['is_valid_admin'] = true;
            header("Location: .?action=search_vehicles");
        }
        else
        {
            $login_mesage = 'Please login to view this page.';
            include('./view/login.php');
        }
        break;

    case "show_login":
        echo '<script>alert(" s login ")</script>';   
        include ('./view/login.php');
        break;

    case "register":
        include('util/valid_register.php');
        valid_registration($username, $password, $confirm_password);
        if(valid_registration($username, $password, $confirm_password))
        {
            $errors = valid_registration($username,$password,$confirm_password);
            foreach ($errors as $error)
            {
            echo '<h3>'.$error.'</h3><br/>';
            }
            include('view/register.php');
        } else{
            add_admin($username,$password);
            $_SESSION['is_valid_admin'] = true;
            include('../admin/controllers/vehicles.php');
        }
        break;

    case "show_register":
        echo '<script>alert("show r")</script>';   
        include ('./view/register.php');
        break;

    case "logout":
        echo '<script>alert("logout")</script>';   
        unset($_SESSION['is_valid_admin']);
        session_destroy();
        $session = session_name();
        $expire = strtotime('-1 year');
        $params = session_get_cookie_params();
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie($session, '', $expire, $path, $domain, $secure, $httponly);
        $login_message = 'Please login to view this page.';
        include('./view/login.php');
        break;
    default: 
    $vehicles = get_vehicles_by_class($class_id, $order);
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('./view/vehicle_list.php');   







}