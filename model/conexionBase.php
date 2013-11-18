<?php
//conexion a la base de datos
function conectarBaseDatos(){
	$db_host="127.0.0.1";
	$db_user="esteban";
	$db_pass="estebans16";
	$db_base="grupo_51"; 
try{

	$cn = new PDO("mysql:dbname=$db_base;host=$db_host","$db_user","$db_pass");
	$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$cn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
	return($cn);
	
}catch(PDOException $e){
	return "error" ;

}


}
function cerrarConexion(){
	return null;
}


?>
