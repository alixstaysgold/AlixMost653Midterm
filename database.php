<?php 
   /* $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';


    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e -> getMessage();
        echo $error_message;
        exit();
    }
*/
    

 
    $dsn = 'mysql:lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=patsjzwz4qgedw8r';
    $username = 'f7hh5s22ggfpu19t';
    $password = 'ajvuqgzttv0vh7kc';


    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e -> getMessage();
        echo $error_message;
        exit();
    }

    ?> 