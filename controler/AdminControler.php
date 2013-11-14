<?php
//Conectamos a la base
require_once("../model/modelo.php");
class adminControler {

	function altasybajas() {
		require_once("../libs/Twig/Autoloader.php");
		Twig_Autoloader::register();
		$templateDir="../view/Administracion";
		$loader = new Twig_Loader_Filesystem($templateDir);
		$twig = new Twig_Environment($loader);
//, array("cache" => $templateDirCompi,
//           ));
        $template = $twig->loadTemplate("vistaAltasyBajas.php");
//Probemos descomentando el de abajo y comentadno el de arriba
//$template = $twig->loadTemplate("pruebas.html");
        $usuarios=obtenerUsuarios();
        $arrayNa = array();
        $i=0;
        foreach ($usuarios as $key ) {
        	$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        						'tipo_roll' => $key['tipo_roll'],
        						'id_us' => $key['id_us'] );
        	$i++;
        }
		$template->display(array(
			'opcion1' => RAIZ_SITIO.'admin=cargarAltas',
			'raiz' => RAIZ_SITIO.'user=login',
			'opcion2' => RAIZ_SITIO.'admin=cargarBajas',
			'logg' => RAIZ_SITIO.'user=volverLogging',
			'probando' => $arrayNa ));
	}

	function alta(){
		$nom=$_POST['nombre'];
		$con=$_POST['contrasena'];
		$tipo=$_POST['tipo'];
		$res=$this->validarCampos($nom, $con, $tipo);
		if ( $res ) {
			$obt=obtenerUsuario($nom);
			if ( isset($obt) ){
				if ( ! isset($obt['nombre'])) {
					$cont=hash('sha256', $con);
					$cargar=cargarUsuario($nom, $cont, $tipo);
					if ( $cargar ) {
						echo "Alta correctamente";
					}	//aviso de que se dio alta correctamente
				} else {
						//avisar que existe el usuario en la base de datos
						echo "el usuario ya existe en la base de datos";
					}
			} else {
					//avisar que ubo un errr en la base de datos.
					echo "error en la base de datos";
				}
		} else {
			//error en la validacion dde los datos
			echo "error en la validacion de datos";
			 }

	}

	function cargarAltas(){
		$tipos=obtenerTipos();
		require_once("../view/Administracion/cargarAltas.php");
	}
	
	function validarCampos($nom, $con, $tipo){
		
		return true;
		/*if ((! isset ($us)) || (! isset ($con))) {
				return false; //es sinonimo de 0
			} else{
				return true; //es sinonimo de 1
			}*/
	}
	function cargarBajas(){
		$tipos=obtenerTipos();
		$usuarios=obtenerUsuarios();
		require_once("../view/Administracion/cargarBajas.php");
	}
	function baja(){
		$id_us=$_POST['id_us'];
		$eliminar=eliminarUsuario($id_us);
		if ( $eliminar ) {
			echo "Baja correctamente";
		}	//aviso de que se dio alta correctamente
		else {
				//avisar que existe el usuario en la base de datos
				echo "No se pudo realizar la baja correctamente";
			}
	}
}

?>

