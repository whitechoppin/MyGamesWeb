<?php
class Database
{    
    private static $cont  = null;
    
    private static $serverName = "mygamesweb.database.windows.net"; // update me
    
    private static $connectionOptions = array(
        "Database" => "permainan", // update me
        "Uid" => "alexwibowo", // update me
        "PWD" => "08Maret2017" // update me
    );
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
            try {
                self::$cont = sqlsrv_connect(self::$serverName, self::$connectionOptions);
                //$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (Exception $e) {
                print("Error connecting to SQL Server.");
                die(print_r($e));
            }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
