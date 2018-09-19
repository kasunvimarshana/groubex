<?php
    include_once("../model/Session.php");
    /*Directory Seperator*/
    !defined('DS') ? define('DS', DIRECTORY_SEPARATOR) : null;
    /*Database Constance*/
    !defined('DB_HOST') ? define('DB_HOST', 'localhost') : null;
    !defined('DB_USER') ? define('DB_USER', 'root') : null;
    !defined('DB_PASSWORD') ? define('DB_PASSWORD', 'root') : null;
    !defined('DB_NAME') ? define('DB_NAME', 'groubex') : null;
    !defined('DB_PORT') ? define('DB_PORT', '3306') : null;

    !defined('S3KEY') ? define('S3KEY', 'AKIAIDCMUICCRKFGPSDQ') : null;
    !defined('S3SECRET') ? define('S3SECRET', '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') : null;
    !defined('S3BUCKET') ? define('S3BUCKET', 'qrcodegroubex') : null;
    !defined('S3SIGNATURE') ? define('S3SIGNATURE', 'v4') : null;
    !defined('S3REGION') ? define('S3REGION', 'us-east-2') : null;

    /*page constants*/
    !defined('OBJ_REG') ? define('OBJ_REG', 1) : null;
    !defined('OBJ_EDIT') ? define('OBJ_EDIT', 2) : null;
    !defined('OBJ_LIST') ? define('OBJ_LIST', 3) : null;
    !defined('OBJ_VIEW') ? define('OBJ_VIEW', 4) : null;
    $cons_OBJUPLOAD = [OBJ_REG, OBJ_EDIT, OBJ_LIST, OBJ_VIEW];
    !defined('CONS_OBJUPLOAD') ? define('CONS_OBJUPLOAD', $cons_OBJUPLOAD) : null;
    /*input constant*/
    /*date constants*/
    $dayUnits = ["day"=>"day", "month"=>"month", "year"=>"year"];
    !defined('DAY_UNITS') ? define('DAY_UNITS', $dayUnits) : null;
	/*
        autoload function
        find the missing classes
        @param $classname string
        @return string
    */
    function __autoload($classname) {
        $filename = $classname.".php";
		$files = new RecursiveDirectoryIterator("..");
		$files->setFlags(FileSystemIterator::SKIP_DOTS | FileSystemIterator::UNIX_PATHS);
		$files = new RecursiveIteratorIterator($files);
		foreach($files as $file){
			if($file->getFilename() == $filename){
				include_once($file);
                return;
			}
		}
    }
    /*
    check valid date (database format)
    @param $date date
           format (Y-m-d)
    @return boolean
    */
    function dateFormatDB($date){
        $d = DateTime::createFromFormat("Y-m-d", $date);
        return $d && $d->format("Y-m-d") === $date;
    }
    /*
    check valid date (input field format)
    @param $date date
           format (m/d/Y)
    @return boolean
    */
    function dateFormatInput($date){
        $d = DateTime::createFromFormat("m/d/Y", $date);
        return $d && $d->format("m/d/Y") === $date;
    }
    /*
    check valid date
    @param $date date
           format (Y-m-d)
           format (m/d/Y)
    @return boolean
    */
    function checkDateF($date){
        $r1 = dateFormatDB($date);
        $r2 = dateFormatInput($date);
        return $r1 || $r2;
    }
    /*
    get date range
    @param $beginDate date
           format (Y-m-d)
    @param $endDate date
           format (Y-m-d)
    @return boolean
    */
    function getDateRange($beginDate, $endDate){
        //$begin = new DateTime('Y-m-d');
        $begin = new DateTime($beginDate);
        $end = new DateTime($endDate);
        $end = $end->modify('+1 day');
        $interval = new DateInterval('P1D');
        $dateRange = new DatePeriod($begin, $interval, $end);
        return $dateRange;
    }
    /*create date
    @param $date date
           format (Y-m-d)
    @param $unit string
           (day, month, year)
    @param $number integer
    @param $pm char
           (+, -)
    @return date
    */
    function f_getDate($date="", $unit="", $number="", $pm=""){
        $tempDate = date('Y-m-d', time());
        $date = empty($date) ? $tempDate : $date;
        $date = checkDateF($date) ? $date : $tempDate;
        $unit = array_key_exists($unit, DAY_UNITS) ? DAY_UNITS[$unit] : "day";
        $number = is_numeric($number) ? $number : 0;
        $rDate = new DateTime($date);
        $un = "+".$number." ".$unit;
        switch($pm){
            case "+" :
                $un = "+".$number." ".$unit;
                $rDate->modify($un);
                break;
            case "-" :
                $un = "-".$number." ".$unit;
                $rDate->modify($un);
                break;
        }
        return $rDate;
    }
    /*redirect page
    @param $page constant
    */
    function redirectPageTo($page){
        $page = $_SERVER["PHP_SELF"]."?contentPage=".$page;
        header('Location: '.$page);
    }
    /*get file extension
    @param $str filename
    @return fileextension*/
    function getExtension($str){
         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
    }

?>