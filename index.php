<?php
require_once dirname(__FILE__) . '/includes/autoload.php';

$class 	= isset($_REQUEST['class'])  ? $_REQUEST['class'] : 'Home';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$id		= isset($_REQUEST['id']) 	? $_REQUEST['id'] : null;

if($class!=null){
	$className = $class . 'Controller';
	if(class_exists($className)){
		$obj = new $className($action,$id);	
	}else{
		$obj = new HomeController('erro');	
	}
}

