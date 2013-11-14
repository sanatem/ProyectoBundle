<?php
require_once("../model/modelo.php");
require_once("../libs/Twig/Autoloader.php");

class userControler {

	function userControler()
	{
		return $this;	
	}
	function volverLogging(){
		session_start();
		require_once("../libs/Twig/Autoloader.php");
		Twig_Autoloader::register();
		$templateDir="../view/Administracion";
		$loader = new Twig_Loader_Filesystem($templateDir);
		$twig = new Twig_Environment($loader);
//, array("cache" => $templateDirCompi,
//           ));
        $template = $twig->loadTemplate("vistaAdmin.php");
//Probemos descomentando el de abajo y comentadno el de arriba
//$template = $twig->loadTemplate("pruebas.html");
		$template->display(array(
		'raiz' => RAIZ_SITIO.'admin=altasybajas',
		'tablas' => RAIZ_SITIO.'user=loginOut',
		'nombreAdmin' => $_SESSION['usuario']
));
	}




	function login () {
		$us=$_POST['usuario'];
		$con=$_POST['contrasena'] ;

		if ( $this->validarlogin($us, $con) ) {
			$cont=hash('sha256', $con);
			$usuarios=logearse($us, $cont);
			

			if ($usuarios != "error" ){
				
				if ( isset($usuarios['tipo_roll']) ) {
					
					session_start();
					$_SESSION['estado']="logeado" ;
					$_SESSION['usuario']=$us;
					if ( $usuarios['tipo_roll'] == 1 ){
						$_SESSION['tipo_roll']=1;
						$templateDir= "../view/Administracion";
						$vista="vistaAdmin.php" ;
						$array=array('raiz' => RAIZ_SITIO."admin=altasybajas",
								'tablas' => RAIZ_SITIO."user=loginOut",
								'nombreAdmin' => $us
 								);
						

					}else {
					  if ( $usuarios['tipo_roll'] == 2 ){
							$_SESSION['tipo_roll']=2;
							$templateDir="../view/FBA";
							$vista="vistaFba.php" ;
							$list=array('l1' => array('name' => 'crear encuesta','value' => RAIZ_SITIO."Fba=crearEncuesta"), 
								'l2' => array('name' => 'Dar de alta laboratorio','value' => RAIZ_SITIO."Fba=crearLab") 
								   );
							$array=array('usuario' => $us,
									
									'raizlogOut' => RAIZ_SITIO."user=loginOut",
									'titulo' => 'Personal FBA',
									'bienv' => 'Bienvenido personal de la FBA',
									'cerrar' => 'cerrar session',
									'li' => $list
									);


						}else{
							$templateDir="../view/Laboratorio";
							$_SESSION['tipo_roll']=3;
							$list=array('l1' => array('name' => 'Encuestas','value' => RAIZ_SITIO."Laboratorio=irEncuestas"), 
								'l2' => array('name' => 'Informes','value' => RAIZ_SITIO."Laboratorio=irInformes"), 'l3' => array('name' => 'Cerrar sesi&oacute;n','value' => RAIZ_SITIO."User=loginOut")
								   );
							$array = array('list' => $list, 'contenido' => 'Bienvenido al &Acute;rea de Laborat&oacute;rio. En este sitio podr&aacute; ver las encuestas disponibles, cargar los resultados de cada encuesta y visualizar su
												//informe particular y aquellos que sean de dominio público.');
							$vista="vistaLaboratorio.php";
						}
					}

				}else {
					//no se encontro en la base de datos
					$templateDir="../view";
					$vista="login.php";
					$array=array('error' => 'usuario y contraseña erronea'  );
				}

			} else{
			//Error en la base de datos
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