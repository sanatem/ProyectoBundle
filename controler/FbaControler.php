<?php
//Conectamos a la base
require_once("../model/modelo.php");
require_once("../libs/validarsesion.php");
require_once("validacionesFba.php");
class FbaControler {
	function cargarVista($vista, $array){
		require_once("../libs/Twig/Autoloader.php");
			Twig_Autoloader::register();
			$templateDir="../view/FBA";
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);
			 $template = $twig->loadTemplate("$vista");
			$template->display($array);


	}

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
									'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging")
									   );
			$template->display(array('usuario' => $_SESSION['usuario'],
										'labs' => $labs,
										'baja' => RAIZ_SITIO."Fba=baja",
										'modi' => RAIZ_SITIO."Fba=cargarmodificar",
										'list' => $list,
										'est' => $est,
										'dire' => RAIZ_SITIO."Fba=listarLab",
										'nameCerrar' => 'Cerrar sesion',
										'valueCerrar' => RAIZ_SITIO."user=loginOut"
										));
		}
	}

	function volverLogging(){
		if (validarsesion(2)){

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
			$res=$this->validarCampos($insti, $codigoLab, $sector,$responsable, $dir, $dir_correo, $empre, $codpost, $mail, $tel, '1', '1' );
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
		
	 	}
    }
	function cargarform(){
		if (validarsesion(2)){		
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
	       
			$list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging")
									   );
			$template->display(array('usuario' => $_SESSION['usuario'],
										'agregar' => RAIZ_SITIO."Fba=alta",
										'list' => $list,
										'tipl' => $tipLab,
										'tip' => $tip_pru,
										'pai' => $pais,
										'ciud' => $ciudad,
										'usLab' => $usLab,
										'nameCerrar' => 'Cerrar sesion',
										'valueCerrar' => RAIZ_SITIO."user=loginOut"
				
										));
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
			$list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging")
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
										'user' => $us,
										'nameCerrar' => 'Cerrar sesion',
										'valueCerrar' => RAIZ_SITIO."user=loginOut"
				
										));
		}
	}

	function cargarEncuestas(){
		if (validarsesion(2)){
	        $vista="encuestasLab.php";
	        $list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging")
									   );
	        $encuestas=obtenerEncuestas();
	       	$arr=array('list' => $list,
	        							'agregar' => RAIZ_SITIO."Fba=formEncuestas" ,
										'encuestas' => $encuestas,
										'verEncuesta' => RAIZ_SITIO."Fba=verEncuesta",
										'nameCerrar' => 'Cerrar sesion',
										'valueCerrar' => RAIZ_SITIO."user=loginOut"

										);
	       	$this->cargarVista($vista, $arr);


		}
		
	}
	function formEncuestas(){
		if(validarsesion(2)){
			if ( ! isset ($_GET['tipo'])) {
				$tip=1 ;
				
			}else{ $tip=$_GET['tipo']; }
			$pruebas=obtenerTipoPruebaId($tip);
			
			
			foreach ( $pruebas as $pr) {

				if( $pr['nombre'] == 'Phe' ) {
					$tip='Fenilalanina';
					$met=obtenerMetodos($tip);
					$ret=obtenerReactivos($tip);
					$calPapel=obtenerCalibradoresyPapelFiltro();
					$inter=obtenerInterpretacion($tip);
					$decision=obtenerDecision($tip);

					$arr=array('nombre' => $pr['nombre'],
								'id_prueba' => $pr['id_prueba'],
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

					$arr=array('nombre' => $pr['nombre'],
								'id_prueba' => $pr['id_prueba'],
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

					$arr=array('nombre' => $pr['nombre'],
								'id_prueba' => $pr['id_prueba'],
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

					$arr=array('nombre' => $pr['nombre'],
									'id_prueba' => $pr['id_prueba'],
									'met' => $met,
									'ret' => $ret,
									'calPapel' => $calPapel,
									'inter' => $inter,
									'decision' => $decision);
				}
				
			}
			$tippr=obtenerTipoPrueba();
			$res=array('r1' =>$arr );
			$vista="responderEncuesta.php";
	        $list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging")
									   );
	        $array=array('list' => $list,
										'res' => $res,
										'responder' => RAIZ_SITIO."Fba=responder",
										'tipospr' => $tippr,
										'nameCerrar' => 'Cerrar sesion',
										'valueCerrar' => RAIZ_SITIO."user=loginOut",
										'agregar' => RAIZ_SITIO."Fba=formEncuestas"
										);
	        $this->cargarVista($vista, $array);




		}
	}

	function responder(){
		if (validarsesion(2)) {
			if( datecheck($_POST['fecha_inicio'],'ymd') && (datecheck($_POST['fecha_fin'],'ymd')) && (is_numeric($_POST['resultado1'])) && (is_numeric($_POST['resultado2'])) && (is_numeric($_POST['corte'])) ){
			
					$id=$_POST['ti_pr'];
					
					$fechIn=$_POST['fecha_inicio'];
					
					$fechFin=$_POST['fecha_fin'];
					
					$met=$_POST['metodo'];
					
					$ret=$_POST['reactivo'];
					
					$cal=$_POST['calibrador'];
					
					$papel=$_POST['papel'];
					
					$intera=$_POST['intera'];
					
					$interb=$_POST['interb'];
					
					$decisiona=$_POST['decisiona'];
					
					$decisionb=$_POST['decisionb'];
					
					$resul1=$_POST['resultado1'];
					
					$resul2=$_POST['resultado2'];
					
					$corte=$_POST['corte'];
					
					$comen=$_POST['coment']; 
		
			
					$exi=agregarRespuestaEncuesta($met, $ret,$cal,$papel,$intera,$interb,$decisiona,$decisionb,$resul1,$resul2, $id, $corte, $comen, $fechIn, $fechFin);
					$res=ultimaEncuesta();
					$lab=obtenerLaboratoriosAsignarlesEncuestas($fechIn, $fechFin);
					$id_encuesta=$res['id_encuesta'];
								
					foreach ($lab as $la ) {
						$id_lab=$la['id_laboratorio'];
						setearEncuesta($id_lab, $id_encuesta);
					}
			
					$this ->volverLogging();
		}else{
				echo "datos erroneos";
			}
		}
		

	}


	function validarRespuesta($res1, $res2, $cort){
		if(is_numeric($res) && is_numeric($res2) && is_numeric($cort)){
			return true;

		}else{ return false;
		}

	}

	function verEncuesta(){
		$idEn=$_POST['id_encuesta'];
		$enc=obtenerEncuestasId($idEn);
		
			$pr=obtenerPruebaPorId($enc['id_prueba']); //nombre prueba
			$namePr=$pr[0]['nombre'];
			$fechIn=$enc['fecha_inicio'];
			$fechFin=$enc['fecha_fin'];
			//metdoo
			$getMet=obtenerMetodoPorId($enc['id_metodo']);
			$metodo=$getMet['nombre'];
			 //reactivo
			$getRea=obtenerReactivoPorId($enc['id_reactivo']);
			$reac=$getRea['nombre'];
			 //calibrador
			$getCal=obtenerCalibradorPorId($enc['id_calibrador']);
			$cal=$getCal['nombre'];
			//papel
			$getPap=obtenerPapelPorId($enc['id_papel']);
			$papel=$getPap['nombre'];
			//valor corte
			$corte=$enc['valor_corte'];
			//resultado 1
			$res1=$enc['res_control_muestra1'];
			//resultado 2
			$res2=$enc['res_control_muestra2'];
			//interpretacion 1
			$getIntera=obtenerInterpretacionPorId($enc['interpretacion_contro_muestra1']);
			$intera=$getIntera['nombre'];
			//interpretacion 2
			$getInterb=obtenerInterpretacionPorId($enc['interpretacion_contro_muestra2']);
			$interb=$getInterb['nombre'];
			// decision 1
			$getDecisiona=obtenerDesicionPorId($enc['decision_control_muestra1']);
			$decisiona=$getDecisiona['nombre'];
			//decision 2
			$getDecisionb=obtenerDesicionPorId($enc['decision_control_muestra2']);
			$decisionb=$getDecisionb['nombre'];
			//comentario
			
			$comentario=$enc['comentario'];
		$list=array( 'l2' => array('name' => 'Volver','value' => RAIZ_SITIO."Fba=volverLogging")
						
									   );
		$vista="verEncuesta.php";
		$array=array('nombrePr' => $namePr,
					 'fechIn' => $fechIn,
					  'fechFin' => $fechFin,
					  'metodo' => $metodo,
					  'reactivo' => $reac,
					  'calibrador' => $cal,
					  'papel' => $papel,
					  'corte' => $corte,
					  'res1' => $res1,
					  'res2' => $res2,
					  'intera' => $intera,
					  'interb' => $interb,
					  'decisiona' => $decisiona,
					  'decisionb' => $decisionb,
					  'comentario' => $comentario,
					  'list' => $list,
					  'nameCerrar' => 'Cerrar sesion',
					  'valueCerrar' => RAIZ_SITIO."user=loginOut");
		$this->cargarVista($vista, $array);

	}

}
 function datecheck($input,$format="")
    {
        $separator_type= array(
            "/",
            "-",
            "."
        );
        foreach ($separator_type as $separator) {
            $find= stripos($input,$separator);
            if($find<>false){
                $separator_used= $separator;
            }
        }
        $input_array= explode($separator_used,$input);
        if ($format=="mdy") {
            return checkdate($input_array[0],$input_array[1],$input_array[2]);
        } elseif ($format=="ymd") {
            return checkdate($input_array[1],$input_array[2],$input_array[0]);
        } else {
            return checkdate($input_array[1],$input_array[0],$input_array[2]);
        }
        $input_array=array();
    }



?>