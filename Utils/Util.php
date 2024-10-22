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


}