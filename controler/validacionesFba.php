<?php
$patron1="/^[0-9]*$/";        // Solo cadena vacia o numeros
$patron2="/^[0-9]+$/";              // Solo numeros. No se admite cadena vacia
$patron3="/^[a-zA-Z]+$/";             // Solo letras en mayusculas/minusculas. No se admite cadena vacia
$patron4="/^[0-9a-zA-Z]+$/";		 // Solo letras en mayusculas/minusculas y numeros. No se admite cadena vacia 

function soloDigitos($cadena1){
if (preg_match("/^[0-9]+$/", $cadena1)){
	return true;
}
else{
 	return false;
}
}
function soloLetras($cadena1){
if (preg_match("/^[a-zA-Z]+/", $cadena1)) {
	return true;
}
else{
 	return false;
}
}
function cualquieraDeLasDos($cadena1){
if (preg_match("/^[0-9a-zA-Z]+/", $cadena1)) {
	return true;
}
else{
 	return false;
}
}
function soloMails($cadena1) { 
if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$cadena1))
	{ 
return true; 
} 
else {
return false;
}
}
function blancos($cadena){
	if(preg_match("/^[a-zA-Z]+/",$cadena1))
	{ 
return false; 
} 
else {
return true;
}
}
?>