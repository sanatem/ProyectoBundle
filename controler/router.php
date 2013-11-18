<?php
/**
 * Se utiliza la funcion magica __autoload para Autocargar los archivos que estan en la carpeta modelo
 * @param type $nombreClase
 */
function __autoload($nombreClase){
    $archivo = "../model/".$nombreClase.".php";
    if(file_exists($archivo)){
        include_once($archivo);
    }  else {
        die("El archivo $archivo que contiene la clase $nombreClase no se encontro");
    }
}

/** 
 * En esta parte tomamos la peticion que se ha enviado a la aplicacion y la separamos en dos arreglos:
 * El primer arreglo tendra dos elementos, el modelo y la accion; el segundo arreglo tendra
 * los parametros adicionales que se pasaran a la aplicacion.
 */
$peticion = $_SERVER['QUERY_STRING']; //Ej: http://localhost/EjemploMVC/index.php?QUERY_STRING
$urlArray = explode("&", $peticion);
$strModelo = array_shift($urlArray);
$datosModelo = explode("=", $strModelo);


/**
 * Aqui se prepara el segundo arreglo de parametros
 */
$parametros = array();

foreach ($urlArray as $argumentos) {
    list($vars, $valor) = explode("=", $argumentos);
    $parametros[$vars] = $valor;
}


//Nombre de la clase control. el metodo ucfirst coloca en Mayuscula la primera letra de la cadena que se le pasa.
$claseControl = ucfirst($datosModelo[0])."Controler";

//Nombre del modelo
$metodo = strtolower($datosModelo[1]);


//Direccion del archivo que tiene la clase control.
$destino = "./".$claseControl.".php";


if(file_exists($destino)){
    include_once ($destino);
    if(class_exists($claseControl)){
        //$controlador = new PersonaControl();
        $controlador = new $claseControl();
        if(method_exists($controlador, $metodo)){
            $controlador->$metodo($parametros);
        }  else {
            die("No existe un metodo llamado $metodo en la clase $claseControl");
        }
    }  else {
        die("No existe una clase llamada $claseControl");
    }
}  else {
    die("No existe el archivo $destino");
}

?>
