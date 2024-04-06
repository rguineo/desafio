<?php 

include_once ('conexion.php');


Class ModeloSesion {

	static public function iniciarSesionMdl($usuario, $password) {
		//echo "SELECT * FROM usuario WHERE username = '$usuario' AND password = MD5('$password')";
		$sql = (new Conexion)->Conectar()->prepare("SELECT * FROM usuario WHERE username = '$usuario' AND password = MD5('$password')");
		$sql -> execute();
		return $sql->fetch();
	}

}

Class registroLog {

	public function registrarLog($usuario, $password){
		$sql = (new Conexion)->Conectar()->prepare("INSERT INTO log VALUES(NULL, NOW(), '$usuario', '$password')");

		if ($sql->execute()){
			return "ok";
		} else {
			return "error";
		}
	}

	public function buscarLog(){
		$sql = (new Conexion)->Conectar()->prepare("SELECT * FROM log ORDER BY date_log DESC");
		$sql -> execute();
		return $sql->fetchAll();	
	}

}

?>