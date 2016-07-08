<?php

//define("EXTERNAL_LIBS_PATH", 'C:/xampp/xampplite/htdocs/externallibs/');

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload(){
		$modelLoader = new Zend_Application_Module_Autoloader(array(
			"namespace" => '',
			"basePath" => APPLICATION_PATH));	
				
		return $modelLoader;	
	}
		
} 