<?php 

Class Conexion {

	public function Conectar () {
		
		$local = true;

		if($local == true){
			$link = new PDO("mysql:host=localhost;dbname=tesoro",
				"root",
				"",
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
		} else {
			$link = new PDO("mysql:host=localhost;dbname=technoso_desafio",
				"technoso_desusr",
				"desafio123",
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
		}
		return $link;
	}
}

?>