<?php
require_once("conexionBase.php");

function logearse($us, $con) {
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM usuario where nombre= :Nombre And contrasena= :Contrasena");
	 $query->execute(array('Nombre' => $us,
							'Contrasena' => $con));
	 $res = $query->fetch();
	 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
 function cargarUsuario($us, $con, $tipo) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("INSERT INTO `usuario`(`nombre`, `contrasena`, `tipo_roll`) VALUES (:Nombre, :Contrasena, :Tipo_roll)");
		 $res = $query->execute(array('Nombre' => $us,
								'Contrasena' => $con,
								'Tipo_roll' => $tipo)) ;

	}else {
		$res= "error";
		
	}
	return $res;

  }

function obtenerTipos(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM roll ");
	 $query->execute();
	 $res = $query->fetchAll();
	 
	}else {
		$res= "error";
		
	}
	return $res;

}

 function obtenerUsuario($us){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM usuario where nombre= :Nombre");
	 	$query->execute(array('Nombre' => $us)); 
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}

 function obtenerUsuarios(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`tipo_roll`,`id_us` FROM usuario");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function eliminarUsuario($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("DELETE FROM `usuario` WHERE `id_us`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
	}else {
		$res= "error";
		
	}
	return $res;

 }

?> 




