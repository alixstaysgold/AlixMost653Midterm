 <?php 

    class Database
{
     private static $dsn = 'mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=je132qzsqwi45k1l';
    private static $username = 'uafgtkkgfamydekk';
    private static $password = 'rmyd2np0ng51y10q';
    private static $db;

    private function __construct()  {}


    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(
                    self::$dsn,
                    self::$username,
                    self::$password
                );
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('view/error.php');
                exit();
            }
        }
        return self::$db;
    }
} 

/* 
    private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    private static $username = 'root';
    private static $password = '';
    private static $db;

    private function __construct()  {}


    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(
                    self::$dsn,
                    self::$username,
                    self::$password
                );
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('view/error.php');
                exit();
            }
        }
        return self::$db;
    } */
