 <?php 
  $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';


    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e -> getMessage();
        echo $error_message;
        exit();
    } 

   
/* 
    $username = 'uafgtkkgfamydekk';
    $password = 'rmyd2np0ng51y10q';


    try {
        $db = new PDO('mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=je132qzsqwi45k1l', $username, $password);
    } catch (PDOException $e) {
        $error_message = $e -> getMessage();
        echo $error_message;
        exit();
    }

    ?>   */