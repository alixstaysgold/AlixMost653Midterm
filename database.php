<?php 
    $dsn = 'mysql:host=localhost;dbname=zippysusedautos';
    $username = 'root';


    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e -> getMessage();
        echo $error_message;
        exit();
    }

    ?>