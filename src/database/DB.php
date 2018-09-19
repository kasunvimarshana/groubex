<?php
	require_once("../util/MyInit.php");
    /*ALTER TABLE worksummary ADD CONSTRAINT CON_SUMMARY UNIQUE (allocate,workDay);*/
    class DB{
        
        private static $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT;
        private static $dbConnection;
        
        public function __construct(){
            //self::$dbConnection =& self::getConnection();
            self::connect();
        }
        
        /*function to get PDO object*/
        public static function &getConnection(){
            self::connect();
            return self::$dbConnection;
        }
        
        private static function connect(){
            if(!isset(self::$dbConnection)){
                self::$dbConnection = new PDO(self::$dsn, DB_USER, DB_PASSWORD);
                //set attributes
                self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$dbConnection->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
            }
        }
        
        //escape string
        public static function quote($string){
            $string = self::$dbConnection->quote($string);
            return $string;
        }
        
    }

?>