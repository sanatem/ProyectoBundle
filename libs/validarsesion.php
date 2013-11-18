<?php
function validarsesion($idses){
	session_start();
	if ((isset($_SESSION['estado']) && (isset($_SESSION['usuario'])) && ( $_SESSION['tipo_roll']= $idses )  )) {
		return true;

	}
	else {
		return false;
	}
}

?>