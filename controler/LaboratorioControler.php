<?php

//Conectamos a la base
require_once("../model/modelo.php");
require_once("validaciones.php");
require_once("../libs/validarsesion.php");
class LaboratorioControler {

	function id(){
		return 3;
	}

	function irEncuesta() {
		if ( validarsesion($this->id())){
		$encuestas = array();
		$lab = obtenerLaboratorioPorId($_SESSION['id']);
		if (isset($lab)){
		$encuestas = obtenerEncuesta($lab);
		$encuestaA = $encuestas['0'];
		$encuestaB = $encuestas['1'];
		$nombreA = $encuestaA['nombre'];
		$nombreB = $encuestaB['nombre'];
		$fecha_inicio = obtenerFecha($encuestas);
		$nombres = array($nombreA, $nombreB);

		$metodosA=obtenerMetodoPorId($encuestaA['id_metodo']);
		$calibradoresA=obtenerCalibradorPorId($encuestaA['id_calibrador']);
		$reactivosA=obtenerReactivoPorId($encuestaA['id_reactivo']);
		$papelesA=obtenerPapelPorId($encuestaA['id_papel']);
		$interpretacionesA=array(obtenerInterpretacionPorId($encuestaA['interpretacion_contro_muestra1']),
								obtenerInterpretacionPorId($encuestaA['interpretacion_contro_muestra2']));
		$desicionesA=array(obtenerDesicionPorId($encuestaA['decision_control_muestra1']), 
						obtenerDesicionPorId($encuestaA['decision_control_muestra2']));

		$metodosB=obtenerMetodoPorId($encuestas['1']['id_metodo']);
		$calibradoresB=obtenerCalibradorPorId($encuestas['1']['id_calibrador']);
		$reactivosB=obtenerReactivoPorId($encuestas['1']['id_reactivo']);
		$papelesB=obtenerPapelPorId($encuestas['1']['id_papel']);
		$interpretacionesB=array(obtenerInterpretacionPorId($encuestaB['interpretacion_contro_muestra1']),
								obtenerInterpretacionPorId($encuestaB['interpretacion_contro_muestra2']));
		$desicionesB=array(obtenerDesicionPorId($encuestaB['decision_control_muestra1']), 
						obtenerDesicionPorId($encuestaB['decision_control_muestra2']));
		if ( (isset($nombreA)) & (isset($nombreB)) 
			& (isset($metodosA)) & (isset($calibradoresA)) & (isset($reactivosA)) 
			& (isset($papelesA)) & (isset($interpretacionesA)) & (isset($desicionesA)) 
			& (isset($metodosB)) & (isset($calibradoresB)) & (isset($reactivosB)) 
			& (isset($papelesB)) & (isset($interpretacionesB)) &(isset($desicionesB)) ){

		require_once("../libs/Twig/Autoloader.php");
		
		Twig_Autoloader::register();

		$templateDir="../view/Laboratorio";

		$loader = new Twig_Loader_Filesystem($templateDir);

		$twig = new Twig_Environment($loader);
		            
		$template = $twig->loadTemplate("vistaEncuesta.php");
		
		$template->display(array('titulo' => '../view/img/bannerEncuesta.png', 
								'tipo_prueba' => $nombres,
								'metodosA' => $metodosA,
								'calibradoresA' => $calibradoresA,
								'reactivosA' => $reactivosA,
								'papelesA' => $papelesA,
								'interpretacionesA' => $interpretacionesA,
								'desicionesA' => $desicionesA,
								'metodosB' => $metodosB,
								'calibradoresB' => $calibradoresB,
								'reactivosB' => $reactivosB,
								'papelesB' => $papelesB,
								'interpretacionesB' => $interpretacionesB,
								'desicionesB' => $desicionesB,
								'inputs' => array('Cut off (mg/dl):'),
								'campos' => array('Control#:', 'Resultado:', 'Interpretación:', 'Desición:'),
								'datos' => array('l1' => array('Control#' => '91', 'Resultado' => 'mg/dl'), 
												'l2' => array('Control#' => '92', 'Resultado' => 'mg/dl')),
								'fecha_inicio' => $fecha_inicio,
								'contenido' => $encuestas,
								'pedido' => 'nombre',
								'accion' => 'Completar',
								'link' => RAIZ_SITIO.'Laboratorio=irCompletarEncuesta',
								'cerrar_sesion' => RAIZ_SITIO."User=loginOut",
								'volver' => RAIZ_SITIO.'Laboratorio=volverLogging',
								'user_name' => $_SESSION['nombre'],
								'id_user' => $_SESSION['id'],
								'tipo_roll' => $_SESSION['tipo_roll']));
	}else{echo "DATOS ERRONEOS";}
	}else{echo "ERROR CON EL LABORATORIO";}
	}else{echo "ACCESO DENEGADO";}
	}

	function irCompletarEncuesta(){
		if ( validarsesion($this->id()) ){

		if( (isset($_SESSION['id'])) & (isset($_POST['metodoA'])) & (isset($_POST['calibradorA']))
			& (isset($_POST['reactivoA'])) & (isset($_POST['papelA'])) & (isset($_POST['interpretacion1A'])) 
			& (isset($_POST['desicion1A'])) & (isset($_POST['resultado1A'])) & (isset($_POST['interpretacion2A'])) 
			& (isset($_POST['desicion2A'])) & (isset($_POST['resultado2A'])) & (isset($_POST['metodoB'])) 
			& (isset($_POST['calibradorB'])) & (isset($_POST['reactivoB'])) & (isset($_POST['papelB'])) 
			& (isset($_POST['interpretacion1B'])) & (isset($_POST['desicion1B'])) & (isset($_POST['resultado1B']))
			& (isset($_POST['interpretacion2B'])) & (isset($_POST['desicion2B'])) & (isset($_POST['resultado2B']))
			& (isset($_POST['cutA'])) & (isset($_POST['cutB'])) & (isset($_POST['pruebaA'])) & (isset($_POST['pruebaB']))) {

		completarEncuesta($_POST['metodoA'],$_POST['calibradorA'],$_POST['reactivoA'],$_POST['papelA'],$_POST['interpretacion1A'],
								$_POST['desicion1A'],$_POST['resultado1A'],$_POST['interpretacion2A'],$_POST['desicion2A'],$_POST['resultado2A'],
								$_POST['metodoB'],$_POST['calibradorB'],$_POST['reactivoB'],$_POST['papelB'],$_POST['interpretacion1B'],
								$_POST['desicion1B'],$_POST['resultado1B'],$_POST['interpretacion2B'],$_POST['desicion2B'],$_POST['resultado2B'],
								$_POST['fechaAnalisis'],$_POST['comentario'],$_POST['cutA'],$_POST['cutB'],$_POST['pruebaA'],$_POST['pruebaB'],$_POST['fecha_inicio']);
		require_once("../libs/Twig/Autoloader.php");
		Twig_Autoloader::register();
		$templateDir="../view/Laboratorio";
		$loader = new Twig_Loader_Filesystem($templateDir);
		$twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate("vistaLaboratorio.php");
		$list=array('l1' => array('name' => 'Encuestas','value' => RAIZ_SITIO."Laboratorio=irEncuesta"), 
					'l2' => array('name' => 'Informes','value' => RAIZ_SITIO."Laboratorio=irInforme"), 
					'l3' => array('name' => 'Modificar datos','value' => RAIZ_SITIO."Laboratorio=irModificar"));
		$array = array('list' => $list, 
						'cerrar_sesion' => RAIZ_SITIO."User=loginOut",
						'contenido' => 'Bienvenido al Área de Laboratorio. En este sitio podrá ver las encuestas disponibles, cargar los resultados de cada encuesta y visualizar su informe particular y aquellos que sean de dominio público.', 
						'user_name' => $_SESSION['nombre'], 
						'id_user' => $_SESSION['id'],
						'tipo_roll' => $_SESSION['tipo_roll']);
		$template->display($array);
	}else{echo "DATOS ERRONEOS";}
	}else{echo "ACCESO DENEGADO";}
	}



	function irInforme() {
		if ( validarsesion($this->id()) ){

		$informes=obtenerInformes();
		if( (isset($_SESSION['id']))){
		require_once("../libs/Twig/Autoloader.php");
		Twig_Autoloader::register();

		$templateDir="../view/Laboratorio";

		$loader = new Twig_Loader_Filesystem($templateDir);

		$twig = new Twig_Environment($loader);
		            
		$template = $twig->loadTemplate("vistaInforme.php");

		$template->display(array('titulo' => '../view/img/bannerInformes.png', 
								'subtitulo' => array('Informes públicos:', 'Informes propietarios:'),
								'contenido' => $informes,
								'accion',
								'link',
								'cerrar_sesion' => RAIZ_SITIO."User=loginOut",
								'volver' => RAIZ_SITIO.'Laboratorio=volverLogging',
								'user_name' => $_SESSION['nombre'],
								'id_user' => $_SESSION['id'],
								'tipo_roll' => $_SESSION['tipo_roll']));
		}else{echo "DATOS ERRONEOS";}
		}else{echo "ACCESO DENEGADO";}
	}

	function irModificar() {
		if ( validarsesion($this->id()) ){

		$laboratorio=obtenerLaboratorioPorId($_SESSION['id']);

		if ((isset($_SESSION['id'])) & (isset($laboratorio)) ){

		require_once("../libs/Twig/Autoloader.php");
		Twig_Autoloader::register();

		$templateDir="../view/Laboratorio";

		$loader = new Twig_Loader_Filesystem($templateDir);

		$twig = new Twig_Environment($loader);
		            
		$template = $twig->loadTemplate("vistaModificar.php");

		$datos=array('l1' => array('name' =>'Código', 'value' => $laboratorio['codigo_lab']), 
						'l2' => array('name' => 'Institución', 'value' => $laboratorio['institucion']), 
						'l3' => array('name' => 'Sector', 'value' => $laboratorio['sector']), 
						'l4' => array('name' => 'Responsable', 'value' => $laboratorio['responsable']), 
						'l5' => array('name' => 'Domicilio', 'value' => $laboratorio['domicilio']), 
						'l6' => array('name' => 'Domicilio_correspondencia', 'value' => $laboratorio['domicilio_correspondensia']), 
						'l7' => array('name' => 'Tipo', 'value' => $laboratorio['tipo_de_laboratorio']), 
						'l8' => array('name' => 'Empresa', 'value' => $laboratorio['empresa']), 
						'l9' => array('name' => 'Codigo_postal', 'value' => $laboratorio['codigo_postal']),  
						'l10' => array('name' => 'E-mail', 'value' => $laboratorio['correo_electronico']), 
						'l11' => array('name' => 'Teléfono', 'value' => $laboratorio['telefono']));


		$template->display(array('titulo' => '../view/img/bannerLaboratorio.png', 
								'modificar' => RAIZ_SITIO.'Laboratorio=modificar',
								'laboratorio' => $laboratorio,
								'longitud' => -57.952880859375,
								'latitud' => -34.941486057669785,
								'datos' => $datos,
								'cerrar_sesion' => RAIZ_SITIO."User=loginOut",
								'volver' => RAIZ_SITIO.'Laboratorio=volverLogging',
								'user_name' => $_SESSION['nombre'],
								'id_user' => $_SESSION['id'],
								'tipo_roll' => $_SESSION['tipo_roll']));
		}else{echo "DATOS ERRONEOS";}
		}else{echo "ACCESO DENEGADO";}
	}

function modificar(){
		if ( validarsesion($this->id()) ){

			if ((isset($_SESSION['id'])) & (soloDigitos($_POST['Código'])) & (soloDigitos($_POST['Codigo_postal'])) 
				& (soloDigitos($_POST['Teléfono'])) & (minimoUnaLetra($_POST['Institución'])) 
				& (minimoUnaLetra($_POST['Sector'])) & (minimoUnaLetra($_POST['Responsable'])) 
				& (soloDigitos($_POST['Tipo'])) & (minimoUnaLetra($_POST['Empresa'])) 
				& (cualquieraDeLasDos($_POST['Domicilio'])) & (cualquieraDeLasDos($_POST['Domicilio_correspondencia'])) 
				& (soloMails($_POST['E-mail']))){
				$ok = 1;
				if ($_POST['Código'] == $_POST['codlab']){
				}else{
					$labs=verificarExistenciaLab($_POST['Código']);
					if (isset($labs[0])){
						$ok = 0;
					}
				}
				if ($ok==1){
					modLaboratorio($_POST['Código'],$_POST['Institución'],$_POST['Sector'],
									$_POST['Responsable'],$_POST['Domicilio'],$_POST['Domicilio_correspondencia'],
									$_POST['Tipo'],$_POST['Empresa'],$_POST['Codigo_postal'],
									$_POST['E-mail'],$_POST['Teléfono'],$_SESSION['id']);
					require_once("../libs/Twig/Autoloader.php");
					Twig_Autoloader::register();
					$templateDir="../view/Laboratorio";
					$loader = new Twig_Loader_Filesystem($templateDir);
					$twig = new Twig_Environment($loader);
			        $template = $twig->loadTemplate("vistaLaboratorio.php");
					$list=array('l1' => array('name' => 'Encuestas','value' => RAIZ_SITIO."Laboratorio=irEncuesta"), 
								'l2' => array('name' => 'Informes','value' => RAIZ_SITIO."Laboratorio=irInforme"), 
								'l3' => array('name' => 'Modificar datos','value' => RAIZ_SITIO."Laboratorio=irModificar"));
					$array = array('list' => $list, 
									'cerrar_sesion' => RAIZ_SITIO."User=loginOut",
									'contenido' => 'Bienvenido al Área de Laboratorio. En este sitio podrá ver las encuestas disponibles, cargar los resultados de cada encuesta y visualizar su informe particular y aquellos que sean de dominio público.', 
									'user_name' => $_SESSION['nombre'], 
									'id_user' => $_SESSION['id'],
									'tipo_roll' => $_SESSION['tipo_roll']);
					$template->display($array);
					
				}else{
					
					$laboratorio=obtenerLaboratorioPorId($_SESSION['id']);

					if ((isset($_SESSION['id'])) & (isset($laboratorio)) ){

						require_once("../libs/Twig/Autoloader.php");
						Twig_Autoloader::register();

						$templateDir="../view/Laboratorio";

						$loader = new Twig_Loader_Filesystem($templateDir);

						$twig = new Twig_Environment($loader);
						            
						$template = $twig->loadTemplate("vistaModificar.php");

						$datos=array('l1' => array('name' =>'Código', 'value' => $laboratorio['codigo_lab']), 
										'l2' => array('name' => 'Institución', 'value' => $laboratorio['institucion']), 
										'l3' => array('name' => 'Sector', 'value' => $laboratorio['sector']), 
										'l4' => array('name' => 'Responsable', 'value' => $laboratorio['responsable']), 
										'l5' => array('name' => 'Domicilio', 'value' => $laboratorio['domicilio']), 
										'l6' => array('name' => 'Domicilio_correspondencia', 'value' => $laboratorio['domicilio_correspondensia']), 
										'l7' => array('name' => 'Tipo', 'value' => $laboratorio['tipo_de_laboratorio']), 
										'l8' => array('name' => 'Empresa', 'value' => $laboratorio['empresa']), 
										'l9' => array('name' => 'Codigo_postal', 'value' => $laboratorio['codigo_postal']),  
										'l10' => array('name' => 'E-mail', 'value' => $laboratorio['correo_electronico']), 
										'l11' => array('name' => 'Teléfono', 'value' => $laboratorio['telefono']));


						$template->display(array('titulo' => '../view/img/bannerLaboratorio.png', 
												'modificar' => RAIZ_SITIO.'Laboratorio=modificar',
												'laboratorio' => $laboratorio,
												'longitud' => -57.952880859375,
												'latitud' => -34.941486057669785,
												'datos' => $datos,
												'cerrar_sesion' => RAIZ_SITIO."User=loginOut",
												'volver' => RAIZ_SITIO.'Laboratorio=volverLogging',
												'user_name' => $_SESSION['nombre'],
												'id_user' => $_SESSION['id'],
												'mensaje' => "Ya existe un laboratorio con ese codigo en la bases de datos",
												'tipo_roll' => $_SESSION['tipo_roll']));
					}else{echo "DATOS ERRONEOS";}
					}
			}else{echo "DATOS ERRONEOS";}
		}else{echo "ACCESO DENEGADO";}
}

	function volverLogging(){
		if ( validarsesion($this->id()) ){

		if (isset($_SESSION['id'])){
		require_once("../libs/Twig/Autoloader.php");
		Twig_Autoloader::register();
		$templateDir="../view/Laboratorio";
		$loader = new Twig_Loader_Filesystem($templateDir);
		$twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate("vistaLaboratorio.php");
		$list=array('l1' => array('name' => 'Encuestas','value' => RAIZ_SITIO."Laboratorio=irEncuesta"), 
					'l2' => array('name' => 'Informes','value' => RAIZ_SITIO."Laboratorio=irInforme"), 
					'l3' => array('name' => 'Modificar datos','value' => RAIZ_SITIO."Laboratorio=irModificar"));
		$array = array('list' => $list, 
						'cerrar_sesion' => RAIZ_SITIO."User=loginOut",
						'contenido' => 'Bienvenido al Área de Laboratorio. En este sitio podrá ver las encuestas disponibles, cargar los resultados de cada encuesta y visualizar su informe particular y aquellos que sean de dominio público.', 
						'user_name' => $_SESSION['nombre'], 
						'id_user' => $_SESSION['id'],
						'tipo_roll' => $_SESSION['tipo_roll']);
		$template->display($array);
		}else{echo "DATOS ERRONEOS";}
		}else{echo "ACCESO DENEGADO";}
	}



}


?>
