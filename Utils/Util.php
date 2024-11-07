<?php  

class Util{
	static function redirect($location, $type, $em, $data=""){
	    header("Location: $location?$type=$em&$data");
	    exit;
	}

	static function redirectPage($location){
	    header("Location: $location");
	    exit;
	}

	static function isActive($fileName) {
        $currentFile = basename($_SERVER['SCRIPT_NAME'], '.php');
        
        return $currentFile === $fileName ? true : false;
    }
}