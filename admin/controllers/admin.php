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
        
        if(AdminDB::is_valid_admin_login($username, $password))
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
        
        include ('./view/login.php');
        break;

    case "register":
        include('util/valid_register.php');
        ValidRegister::valid_registration($username, $password, $confirm_password);
        
        // if (AdminDB::username_exists($username)) {
        //     array_push($errors, "The username you entered is already taken.");
        // }
        
        if(ValidRegister::valid_registration($username, $password, $confirm_password))
        {
            $errors = self::valid_registration($username,$password,$confirm_password);
            foreach ($errors as $error)
            {
            echo '<h3>'.$error.'</h3><br/>';
            }
            include('view/register.php');
        } else{
            AdminDB::add_admin($username,$password);
            $_SESSION['is_valid_admin'] = true;
            include('../admin/controllers/vehicles.php');
            header('Location:.');
        }
        break;

    case "show_register":
        
        include ('./view/register.php');
        break;

    case "logout":
         
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
    $vehicles = vehicleDB::get_vehicles_by_class($class_id, $order);
    $makes = makeDB::get_makes();
    $types = typeDB::get_types();
    $classes = classDB::get_classes();
    include('./view/vehicle_list.php');   







}