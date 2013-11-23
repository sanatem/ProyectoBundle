<?php
require_once("../libs/validaciones.php");
require_once("../model/modelo.php");
require_once("../libs/Twig/Autoloader.php");

class userControler {

	function userControler()
	{
		return $this;	
	}
	function login () {
		$us=$_POST['usuario'];
		$con=$_POST['contrasena'] ;
		if ((cualquieraDeLasDos($us)) AND (cualquieraDeLasDos($con))){
			if ( $this->validarlogin($us, $con) ) {
				$cont=hash('sha256', $con);
				$usuarios=logearse($us, $cont);
				if ($usuarios != "error" ){
					if ( isset($usuarios['tipo_roll']) ) {
						session_start();
						$_SESSION['estado']="logeado" ;
						$_SESSION['usuario']=$us;
						$_SESSION['id']=$usuarios['id_us'];
						if ( $usuarios['tipo_roll'] == 1 ){
							$_SESSION['tipo_roll']=1;
							$templateDir="../view/Administracion";
        					$vista ="vistaAdmin.php";
							$array=array(
							'raiz' => RAIZ_SITIO.'admin=altasybajas',
							'tablas' => RAIZ_SITIO.'admin=tablasreferencia',
							'parteFBA' => RAIZ_SITIO.'admin=cargarFBA',
							'parteLaboratorio' => RAIZ_SITIO.'admin=cargarLab',
							'logg' => RAIZ_SITIO.'user=loginOut',
							'nombreAdmin' => $_SESSION['usuario']);			
						}else {
								if ( $usuarios['tipo_roll'] == 2 ){
									$_SESSION['tipo_roll']=2;
									$templateDir="../view/FBA";
									$vista="vistaFba.php" ;
									$list=array('l1' => array('name' => 'Administrar encuestas','value' => RAIZ_SITIO."Fba=cargarEncuestas"), 
										'l2' => array('name' => 'Administrar laboratorios','value' => RAIZ_SITIO."Fba=listarLab") 
								   	);
									$array=array('usuario' => $us,
										'raizlogOut' => RAIZ_SITIO."user=loginOut",
										'titulo' => 'Personal FBA',
										'bienv' => 'Bienvenido',
										'cerrar' => 'cerrar session',
										'li' => $list
									);
								}else{
									$templateDir="../view/Laboratorio";
									$_SESSION['tipo_roll']=3;
									$_SESSION['nombre']=$usuarios['nombre'];
									$_SESSION['id']=$usuarios['id_us'];
									$list=array('l1' => array('name' => 'Encuestas','value' => RAIZ_SITIO."Laboratorio=irEncuesta"), 
										'l2' => array('name' => 'Informes','value' => RAIZ_SITIO."Laboratorio=irInforme"), 
										'l3' => array('name' => 'Modificar datos','value' => RAIZ_SITIO."Laboratorio=irModificar"));
									$array = array('list' => $list, 
										'cerrar_sesion' => RAIZ_SITIO."User=loginOut", 
										'contenido' => 'Bienvenido al Área de Laboratorio. En este sitio podrá ver las encuestas disponibles, cargar los resultados de cada encuesta y visualizar su informe particular y aquellos que sean de dominio público.', 
										'user_name' => $_SESSION['nombre'], 
										'id_user' => $_SESSION['id']);
									$vista="vistaLaboratorio.php";
								}
							}
					}else {
					$templateDir="../view";
					$vista="login.php";
					$array=array('error' => 'Usuario o Contraseña erronea'  );
				}
				} else{
					$templateDir="../view";
					$vista= "vistasError.php";
					$array=array('' => ''  );
				}
			} else {
			//Campos mal completados
				$templateDir="../view";
				$vista="vistasError.php" ;
				$array=array('' => ''  );
			}
		}
		else {
			$templateDir="../view";
			$vista="login.php";
			$array=array('error' => 'Ingrese caracteres validos (alfanumericos)');
		}
		Twig_Autoloader::register();
		
		$loader = new Twig_Loader_Filesystem($templateDir);
		$twig = new Twig_Environment($loader);
		            
		$template = $twig->loadTemplate($vista);

		$template->display($array);




	}

	 function validarlogin($us, $con) {
		if ((! isset ($us)) || (! isset ($con))) {
			return false; //es sinonimo de 0
		} else{
			return true; //es sinonimo de 1
		}
	}
	function cargalogin() {


		Twig_Autoloader::register();
		$templateDir="../view";
		$loader = new Twig_Loader_Filesystem($templateDir);
		$twig = new Twig_Environment($loader);
		            
		$template = $twig->loadTemplate("login.php");

		$template->display(array('raiz' => RAIZ_SITIO."user=login"));
		
	}
	
	function loginOut() {
		session_start();
		$_SESSION = array();
		session_destroy();
		header( "Location: ../index.php" );
	}

	function verificarlogin() {
		session_start();

		if (isset ($_SESSION['estado'])) {
			if ( $_SESSION['tipo_roll'] == 1 ){
					require("../view/vistaAdmin.php");
					}else {
					  if ( $_SESSION['tipo_roll'] == 2 ){
							
							require("../view/vistafba.php");
						}else{
							
							require("../view/Laboratorio/vistaLaboratorio.php");
						}
					}
		}
	}

}

?>