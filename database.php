<?php
class Database
{
    private static $dbName = 'permainan' ;
    private static $dbHost = 'mygamesweb.database.windows.net' ;
    private static $dbUsername = 'alexwibowo';
    private static $dbUserPassword = '08Maret2017';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try {
              self::$cont = new PDO('sqlsrv:server=tcp:mygamesweb.database.windows.net,1433;Database=permainan','alexwibowo','08Maret2017');
              self::$cont ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            die($e->getMessage()); 
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
