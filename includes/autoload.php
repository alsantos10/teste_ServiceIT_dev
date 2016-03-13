<?php
function __autoload($classe=null){
	if($classe!=null){
		$dir	 = dirname(__FILE__) .'/';
		$folders = array('controllers/', 'models/DAO/', 'models/Bean/', 'views/');
		foreach ($folders as $folder){
			if(file_exists( $dir.$folder.$classe.'.class.php' )){
				require_once $dir.$folder.$classe.'.class.php';
			}
		}
	}
}
?>
