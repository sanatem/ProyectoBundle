<?php

$usuario=$_GET["id"];
try {
	$cn = new PDO("mysql:dbname=base;host=localhost","user","pass");
	$query = $cn->prepare("SELECT * FROM usuarios WHERE dni=?");
	$query->execute(array($usuario)); 
	while($row = $query->fetch())
	{ 
		echo $row['nombre']; 
	}
	}
catch(PDOException $e){
	echo "ERROR". $e->getMessage();
	}
?>
