<?php
//Conectamos a la base
require_once("../model/modelo.php");
require_once("../libs/validarsesion.php");
require_once("validacionesFba.php");
class FbaControler {

	function listarLab() {
		if (validarsesion(2)){
			if ( ! isset ($_GET['estado'])) {
				$est=0 ;
				
			}else{ $est=$_GET['estado']; }
			require_once("../libs/Twig/Autoloader.php");
			Twig_Autoloader::register();
			$templateDir="../view/FBA";
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);
	        $template = $twig->loadTemplate("crearLab.php");
	        $labs=obtenerTodosLaboratorios();
			
			$list=array('l1' => array('name' => 'Agregar','value' => RAIZ_SITIO."Fba=cargarform"), 
									'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging"),
									'l3' => array('name' => 'Cerrar sesion','value' => RAIZ_SITIO."user=loginOut")
									   );
			$template->display(array('usuario' => $_SESSION['usuario'],
										'labs' => $labs,
										'baja' => RAIZ_SITIO."Fba=baja",
										'modi' => RAIZ_SITIO."Fba=cargarmodificar",
										'list' => $list,
										'est' => $est,
										'dire' => RAIZ_SITIO."Fba=listarLab"
										));
		}else{
			echo "no tiene acceso";
		}
	}

	function volverLogging(){
		if (validarsesion(2)){

			session_start();
			require_once("../libs/Twig/Autoloader.php");
			Twig_Autoloader::register();
			$templateDir="../view/FBA";
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);

			$list=array('l1' => array('name' => 'Administrar encuestas','value' => RAIZ_SITIO."Fba=cargarEncuestas"), 
									'l2' => array('name' => 'Administrar laboratorios','value' => RAIZ_SITIO."Fba=listarLab")
									   );
	        $template = $twig->loadTemplate("vistaFba.php");
			$template->display(array('usuario' => $_SESSION['usuario'],
										
										'raizlogOut' => RAIZ_SITIO."user=loginOut",
										'titulo' => 'Personal FBA',
										'bienv' => 'Bienvenido',
										'cerrar' => 'cerrar session',
										'li' => $list
										));
		}else{
			echo "no tiene acceso";
		}
	}
	function baja(){
		if (validarsesion(2)){	
			$id_lab=$_POST['idlab'];
			$exito=eliminarLaboratorio($id_lab);
			if ( $exito ) {
				$res=ultimaEncuesta();
				$id_encuesta=$res['id_encuesta'];
				historial_lab($id_lab,$id_encuesta);
				$this->listarLab();
					
			}
			else {
					echo "No se pudo realizar la baja correctamente";
				}
		}else{
			echo "no tiene acceso";
		}

	}
	function modificar (){
		if (validarsesion(2)){	
			$insti=$_POST['institucion'];
			$codigoLab=$_POST['codigoLab'];
			$sector=$_POST['sector'];
			$responsable=$_POST['responsable'];
			$tipoLab=$_POST['tipolab'];
			$dir=$_POST['direccion'];
			$dir_correo=$_POST['direccion_corres'];
			$empre=$_POST['empresa'];
			$codpost=$_POST['codpost'];
			$tipoPrueba=$_POST['tipopr']; 
			$mail=$_POST['correo'];
			$tel=$_POST['telefono'];
			$fechapart=$_POST['fechapart'];
			$pais=$_POST['pais'];
			$ciudad=$_POST['ciudad'];
			$idus=$_POST['usu'];
			$vCodLab=$_POST['viejoCodLab'];
			$estado=$_POST['estado'];
			
			$antiEst=$_POST['estadoViejo'];
			$idlab=$_POST['idlab'];
			$res=$this->validarCampos($insti,$codigoLab, $sector,$responsable, $dir, $dir_correo, $empre, $codpost, $mail, $tel, 1, 1 );
			if ($res){

				if($vCodLab == $codigoLab){
					//modifico el laboratorio
				
					if($antiEst != $estado){
						
						$res=cambiarFech($idlab);
						echo $estado;
					}
					$exito=modificarLaboratorio($insti,$codigoLab, $sector, $responsable, $tipoLab, $dir, $dir_correo, $empre, $codpost, $mail, $tel, $fechapart, $pais, $ciudad, $idus, $estado, $idlab);
					if ($exito){
						$eli=eliminarPruebasLab($idlab);
						foreach( $tipoPrueba as $tp){
								cargarLaboratorioPrueba($idlab,$tp); //<ctualizar tipo de prueba
							}
						$this->listarLab();

					}
		
				}else{// si los codigos son distintos, tengo que ver que no coincida con el de algun otr laboratorio en la BD
					$existeLab=obtenerLaboratorio($codigoLab);
					if (isset($existeLab)){
						if (! isset($existeLab['codigo_lab'])){
							//modifico laboratorio
							if($antiEst != $estado){
								$res=cambiarFech($idlab);
							}		
							$exito=modificarLaboratorio($insti,$codigoLab, $sector, $responsable, $tipoLab, $dir, $dir_correo, $empre, $codpost, $mail, $tel, $fechapart, $pais, $ciudad, $estado, $idlab);
							if ($exito){
								$eli=eliminarPruebasLab($idlab);
								foreach( $tipoPrueba as $tp){
									cargarLaboratorioPrueba($idlab,$tp);//<ctualizar tipo de prueba
								}
								$this->listarLab();
								

							}
							
						}else{
							echo "el codio de laboratorio ingresado ya existe";
						}
					}else{
						echo "error en la base de datos";
					}

				}
				
			}else{
				echo "datos ingresados erroneamente";
			}

		}else{
			echo "no tiene acceso";
		}
	}
	function alta(){
		if (validarsesion(2)){	
			$inst=$_POST['institucion'];
			$cod=$_POST['codigoLab'];
			$sector=$_POST['sector'];
			$responsable=$_POST['responsable'];
			$dir=$_POST['direccion'];
			$correspo=$_POST['direccion_corres'];
			$empre=$_POST['empresa'];
			$codP=$_POST['codpost'];
			$tipoLab=$_POST['tipolab'];
			$mail=$_POST['correo'];
			$tel=$_POST['telefono'];
			$fechaPar=$_POST['fechapart'];
			$pais=$_POST['pais'];
			$ciudad=$_POST['ciudad'];
			$lat=$_POST['lati'];
			$long=$_POST['long'];
			$check=$_POST['tipopr'];
			$res=$this->validarCampos($inst,$cod, $sector,$responsable, $dir, $correspo, $empre, $codP, $mail, $tel, $long, $lat );
			if ($res){
				$obtl=obtenerLaboratorio($cod);
				if ( isset($obtl) ) {
					if ( ! isset( $obtl['codigo_lab'] )) {

						$exito=cargarLaboratorio($inst,$cod,$sector,$responsable,$dir,$correspo,$empre,$codP,$tipoLab,$mail,$tel,$fechaPar,$pais,$ciudad, $lat, $long);			
						if ( $exito ){
							echo "aca";
							//cargar prueba-laboratorio
							$lab=obtenerLaboratorio($cod);
							$idLa=$lab['id_laboratorio'];
							
							foreach($check as $opc){
								$resu=cargarLaboratorioPrueba($idLa,$opc);
							}
							$this->volverLogging();
							
						}

					}else{
						echo "ya existe el laboratorio";
					     }
				} else {
					echo "errr en la base de datos";
					//erro en la base de datos
				}


			}else{
				echo "datos ingresados erroneamente";

			}
		
	 	}else{
	 		echo "no tiene acceso";
	 	}
    }
	function cargarform(){
		if (validarsesion(2)){		
			session_start();
			require_once("../libs/Twig/Autoloader.php");
			Twig_Autoloader::register();
			$templateDir="../view/FBA";
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);
	        $template = $twig->loadTemplate("altaLab.php");
	        $tipLab=obtenertiposLab();
	        $tip_pru=obtenerPruebas();
	        $pais=obtenerPaises();
	        $ciudad=obtenerCiudades();
	        $usLab=obtenerUsFBAsinLab();
	       
			$list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging"),
						'l3' => array('name' => 'Cerrar sesion','value' => RAIZ_SITIO."user=loginOut")
									   );
			$template->display(array('usuario' => $_SESSION['usuario'],
										'agregar' => RAIZ_SITIO."Fba=alta",
										'list' => $list,
										'tipl' => $tipLab,
										'tip' => $tip_pru,
										'pai' => $pais,
										'ciud' => $ciudad,
										'usLab' => $usLab
				
										));
		}else{
			echo "no tiene acceso";
		}
	}
	function validarCampos($insti,$codigoLab, $sector,$responsable, $dir, $dir_correo, $empre, $codpost, $mail, $tel, $lon, $lat ) {
		if ( cualquieraDeLasDos($insti) && cualquieraDeLasDos($codigoLab) && soloLetras($sector) && soloLetras($responsable)&&
			cualquieraDeLasDos($dir) && cualquieraDeLasDos($dir_correo) && soloLetras($empre) && soloMails($mail) &&
			soloDigitos($tel) ) {
			return true;
		}else{
			return false;
		}
	}
	function cargarmodificar(){
		if (validarsesion(2)){	
			session_start();
			$id_lab=$_POST['idlab'];
			require_once("../libs/Twig/Autoloader.php");
			Twig_Autoloader::register();
			$templateDir="../view/FBA";
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);
	        $template = $twig->loadTemplate("modLab.php");
	        $tipLab=obtenertiposLab();
	        $tip_pru=obtenerPruebas();
	        $pais=obtenerPaises();
	        $ciudad=obtenerCiudades();
	      	

	        $lab=obtenerLaboratorioid($id_lab);
	        $us=obtenerUsuario($lab['id_usuario']);
	        $prueba_lab=obtenerPruebasLab($id_lab); 
			$list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging"),
						'l3' => array('name' => 'Cerrar sesion','value' => RAIZ_SITIO."user=loginOut")
									   );
			$template->display(array('usuario' => $_SESSION['usuario'],
										'modificar' => RAIZ_SITIO."Fba=modificar",
										'sele' => "selected",
										'check' => "checked",
										'list' => $list,
										'tipl' => $tipLab,
										'tip' => $tip_pru,
										'pai' => $pais,
										'ciud' => $ciudad,
										'lab' => $lab,
										'pruLab' => $prueba_lab,
										'user' => $us
				
										));
		}else{
			echo "no tiene acceso";
		}
	}

	function cargarEncuestas(){
		if (validarsesion(2)){
			require_once("../libs/Twig/Autoloader.php");
			Twig_Autoloader::register();
			$templateDir="../view/FBA";
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);
	        $template = $twig->loadTemplate("encuestasLab.php");
	        $list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging"),
						'l3' => array('name' => 'Cerrar sesion','value' => RAIZ_SITIO."user=loginOut")
									   );
	        $encuestas=obtenerEncuestas();
	        $template->display(array('list' => $list,
	        							'agregar' => RAIZ_SITIO."Fba=agregarEncuestas" ,
										'encuestas' => $encuestas,
										'responder' => RAIZ_SITIO."Fba=responderEncuestas"
										));

		}else {
			echo "no tiene acceso";
		}
	}

	function agregarEncuestas(){
		if (validarsesion(2)){
			$fein=$_POST['fecha_inicio'];
			$fefin=$_POST['fecha_fin'];
			if ($fefin > $fein){
					nuevaEncuesta($fein, $fefin);
					$res=ultimaEncuesta();
					$lab=obtenerLaboratoriosAsignarlesEncuestas($fein, $fefin);
					$id_encuesta=$res['id_encuesta'];
					
					foreach ($lab as $la ) {
						$id_lab=$la['id_laboratorio'];
						
						setearEncuesta($id_lab, $id_encuesta);
					}
					$this -> cargarEncuestas();
			}else {
				echo "fechas ingresadas incorrectamente";
			}
		
		}else {
			echo "no tiene acceso";
		}
	}

	function responderEncuestas(){
		if (validarsesion(2)){
			$idencuesta=$_POST['id_encuesta'];
			$pruebas=obtenerTipoPrueba();
			
			
			foreach ( $pruebas as $pr) {

				if( $pr['nombre'] == 'Phe' ) {
					$tip='Fenilalanina';
					$met=obtenerMetodos($tip);
					$ret=obtenerReactivos($tip);
					$calPapel=obtenerCalibradoresyPapelFiltro();
					$inter=obtenerInterpretacion($tip);
					$decision=obtenerDecision($tip);

					$r1=array('nombre' => $pr['nombre'],
									'met' => $met,
									'ret' => $ret,
									'calPapel' => $calPapel,
									'inter' => $inter,
									'decision' => $decision);
				}
				if( $pr['nombre'] == 'TSH' ) {
					$tip='TSH';
					$met=obtenerMetodos($tip);
					$ret=obtenerReactivos($tip);
					$calPapel=obtenerCalibradoresyPapelFiltro();
					$inter=obtenerInterpretacion($tip);
					$decision=obtenerDecision($tip);

					$r2=array('nombre' => $pr['nombre'],
									'met' => $met,
									'ret' => $ret,
									'calPapel' => $calPapel,
									'inter' => $inter,
									'decision' => $decision);
				}
				if( $pr['nombre'] == 'IRT' ) {
					$tip='Tripsina inmunorreactiva';
					$met=obtenerMetodos($tip);
					$ret=obtenerReactivos($tip);
					$calPapel=obtenerCalibradoresyPapelFiltro();
					$inter=obtenerInterpretacion($tip);
					$decision=obtenerDecision($tip);

					$r3=array('nombre' => $pr['nombre'],
									'met' => $met,
									'ret' => $ret,
									'calPapel' => $calPapel,
									'inter' => $inter,
									'decision' => $decision);
				}
				if( $pr['nombre'] == 'Galactosa' ) {
					$tip='Galactosa';
					$met=obtenerMetodos($tip);
					$ret=obtenerReactivos($tip);
					$calPapel=obtenerCalibradoresyPapelFiltro();
					$inter=obtenerInterpretacion($tip);
					$decision=obtenerDecision($tip);

					$r4=array('nombre' => $pr['nombre'],
									'met' => $met,
									'ret' => $ret,
									'calPapel' => $calPapel,
									'inter' => $inter,
									'decision' => $decision);
				}
				
			}
			$res=array('r1' =>$r1 ,
						'r2' => $r2,
						'r3' => $r3,
						'r4' => $r4 );






			/*$metodos=obtenerMetodos();
			$reactivos=obtenerReactivos();
			$caliPapel=obtenerCalibradoresyPapelFiltro();
			$interpre=obtenerInterpretacion();
			$decision=obtenerDecision();*/
			require_once("../libs/Twig/Autoloader.php");
			Twig_Autoloader::register();
			$templateDir="../view/FBA";
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);
	        $template = $twig->loadTemplate("responderEncuesta.php");
	        $list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging"),
						'l3' => array('name' => 'Cerrar sesion','value' => RAIZ_SITIO."user=loginOut")
									   );
	        $template->display(array('list' => $list,
										'res' => $res,
										'id_encuesta' => $idencuesta,
										'responder' => RAIZ_SITIO."Fba=responder"
										));
		
		}else {
			echo "no tiene acceso";
		}
	}
	function responder(){
		if (validarsesion(2)) {
			$idencuesta=$_POST['id_encuesta'];
			$pruebas=obtenerTipoPrueba();
			foreach ( $pruebas as $pr) {	
				if($pr['nombre'] != 'Otro'){
					$met=$_POST[$pr['nombre'].'metodo'];
					$ret=$_POST[$pr['nombre'].'reactivo'];
					
					$cal=$_POST[$pr['nombre'].'calibrador'];
					
					$papel=$_POST[$pr['nombre'].'papel'];
					
					$intera=$_POST[$pr['nombre'].'intera'];
					;
					$interb=$_POST[$pr['nombre'].'interb'];
					
					$decisiona=$_POST[$pr['nombre'].'decisiona'];
					
					$decisionb=$_POST[$pr['nombre'].'decisionb'];
					
					$resul1=$_POST[$pr['nombre'].'resultado1'];
					
					$resul2=$_POST[$pr['nombre'].'resultado2'];
					
					$corte=$_POST[$pr['nombre'].'corte'];
					
					$comen=$_POST[$pr['nombre'].'coment'];
					
					$id_prueba=$pr['id_prueba'];
					
						$exi=agregarRespuestaEncuesta($met, $ret,$cal,$papel,$intera,$interb,$decisiona,$decisionb,$resul1,$resul2, $id_prueba, $corte, $comen);
						
					
			    }
		
		}	
		$this ->volverLogging();

		}else{
			echo "no tiene acceso";
		}

	}


	function validarRespuesta($res1, $res2, $cort){
		if(is_numeric($res) && is_numeric($res2) && is_numeric($cort)){
			return true;

		}else{ return false;
		}

	}

}



?>