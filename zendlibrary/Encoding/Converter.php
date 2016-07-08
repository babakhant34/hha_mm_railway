<?php

include("zawgyi2unicode.php");

class Innov_Encoding_Converter
{
	private $converter;	
	
	public function __construct(){
		$this->converter = new ZG2Uni();
	}
	
	public function convert($string_zg){
		return $this->converter->zg_uni($string_zg);
	}
}

?>