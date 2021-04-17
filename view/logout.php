<?php include ('header.php'); 
?>
<p>Thank you, <?php echo $_SESSION['userid'] ?>. You have signed out.</p><br>
 <p><a href='.'>Return Home</a>
 <?php 
    unset($_SESSION['userid']);
    session_destroy();
    $session = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    $httponly = $params['httponly'];
    setcookie($session, '', $expire, $path, $domain, $secure, $httponly);
    ?>

