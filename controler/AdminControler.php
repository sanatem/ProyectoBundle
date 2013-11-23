<?php
//Conectamos a la base
require_once("../libs/validaciones.php");
require_once("../libs/Twig/Autoloader.php");
Twig_Autoloader::register();
require_once("../model/modelo.php");
require_once("../libs/validarsesion.php");
class adminControler {
	function cargarLab(){
	if (validarsesion($this->id())){
		$templateDir="../view/Laboratorio";
		$vista="vistaLaboratorio.php";
		$list=array('l1' => array('name' => 'Encuestas','value' => RAIZ_SITIO."Laboratorio=irEncuesta"), 
		'l2' => array('name' => 'Informes','value' => RAIZ_SITIO."Laboratorio=irInforme"), 
		'l3' => array('name' => 'Modificar datos','value' => RAIZ_SITIO."Laboratorio=irModificar"));
		$array = array('list' => $list, 
			'cerrar_sesion' => RAIZ_SITIO."User=loginOut", 
			'contenido' => 'Bienvenido al Área de Laboratorio. En este sitio podrá ver las encuestas disponibles, cargar los resultados de cada encuesta y visualizar su informe particular y aquellos que sean de dominio público.', 
			'user_name' => $_SESSION['usuario'],
			'soyAdmin' => RAIZ_SITIO."admin=volverLogging",
			'id_user' => $_SESSION['id']);
			$vista="vistaLaboratorio.php";
		$this ->cargarTemplate($templateDir,$vista,$array);
	}
	else 
		echo "No tiene permiso a acceder a esta area";
	}
	function cargarFba(){
	if (validarsesion($this->id())){
		$us=$_SESSION['usuario'];
		$templateDir="../view/FBA";
		$vista="vistaFba.php" ;
		$list=array('l1' => array('name' => 'Administrar encuestas','value' => RAIZ_SITIO."Fba=cargarEncuestas"), 
		'l2' => array('name' => 'Administrar laboratorios','value' => RAIZ_SITIO."Fba=listarLab") 
		);
		$array=array('usuario' => $us,	
			'raizlogOut' => RAIZ_SITIO."user=loginOut",
			'titulo' => 'Personal FBA',
			'bienv' => 'Bienvenido',
			'soyAdmin' => RAIZ_SITIO."admin=volverLogging",
			'cerrar' => 'cerrar session',
			'li' => $list
		);
		$this ->cargarTemplate($templateDir,$vista,$array);
	}
	else 
		echo "No tiene permitido el acceso a esta area";
	}
	function cargarTemplate($dir,$view,$variables){
			$templateDir=$dir;
			$loader = new Twig_Loader_Filesystem($templateDir);
			$twig = new Twig_Environment($loader);
        	$template = $twig->loadTemplate($view);
        	$template->display($variables);
	}
	function id(){
		return 1;
	}
	function cargaDinamicaGeneral($tablax = Null,$tipoprub = Null){
		if (validarsesion($this->id())){
			if (!((isset($tipoprub)) AND ($tipoprub!=Null))){
				if (isset($_GET['action'])){
					$iterar=$_GET['action'];
				}
				else{
					$iterar='TSH';
				}
			}
			else{
				$iterar=$tipoprub;
			}
			if(!((isset($tipoprub)) AND ($tipoprub!=Null))){
				if (isset($_GET['quesoy'])){
					$tabla=$_GET['quesoy'];
				}
				else {
					$tabla='Metodo';
				}
			}
			else {
				$tabla=$tablax;
			}
			$valorOriginal=$iterar;
			switch ($iterar) {
				case 'Phe':
					$iterar='Fenilalanina';
					break;
				case 'IRT':
					$iterar='Tripsina inmunorreactiva';
					break;
				case 'TSH':
					$iterar='TSH';
					break;
				case 'Galactosa':
					$iterar='Galactosa';
					break;
				default:
					echo "Falla la prueba";
					break;
			}	
			switch ($tabla) {
				case 'Metodo':
					$datos=conseguirDatosTablaMetodos($iterar);
					break;
				case 'Reactivo':
					$datos=conseguirDatosTablaReactivo($iterar);
					break;
				case 'Decision':
					$datos=conseguirDatosTablaDecision($iterar);
					break;
				case 'Interpretacion':
					$datos=conseguirDatosTablaInterpretacion($iterar);
					break;
				case 'Calibradores':
					$datos=conseguirDatosTablaCalibradores($tabla);
					break;
				case 'PapelDeFiltro':
					$datos=conseguirDatosTablaPapelDeFiltro($tabla);
					break;
				default:
					echo "Falla el metodo";
					break;
				}
			$templateDir="../view/Administracion";
        	$vista="vistaTabla.php";
			$variables=array ('tipotab' => $datos,
										'id' =>'id_'.strtolower($tabla),
										'prim' => 'Alta '.$tabla,
										'alta' => RAIZ_SITIO.'admin=altaTabla',
										'oculto' => $tabla,
										'tip_prub' =>$valorOriginal,
										'baja' => RAIZ_SITIO.'admin=bajaTabla',
										'carga' =>RAIZ_SITIO.'admin=cargaDinamicaGeneral',
										'logg' => RAIZ_SITIO.'admin=volverLogging',
										'lagg' => RAIZ_SITIO.'user=loginOut',
										'modi' => RAIZ_SITIO.'admin=cargarModificarGeneral',
										'prometo' => array('Metodo','Reactivo','Decision','Interpretacion','Calibradores','PapelDeFiltro'));
			$this->cargarTemplate($templateDir,$vista,$variables);
		}
		else {
			echo "No ha iniciado sesion";
		}
	}
	function tablasreferencia(){
		if (validarsesion($this->id())){
			$referencias=conseguirTipoPrueba();
			$templateDir="../view/Administracion";
        	$vista="vistaTablasReferencia.php";
			$variables=array ('prometeo' => $referencias,
										'logg' => RAIZ_SITIO.'admin=volverLogging',
										'lagg' => RAIZ_SITIO.'user=loginOut',
										'tablax' => RAIZ_SITIO.'admin=cargaDinamicaGeneral');
			$this -> cargarTemplate($templateDir,$vista,$variables);
		}
		else {
			echo "No ha iniciado sesión";
		}
	}

	function altasybajas(){
    	if (validarsesion($this->id())){
			$templateDir="../view/Administracion";
	        $vista="vistaAltasyBajas.php";
    	    $usuarios=obtenerUsuarios();
    	    if ( $usuarios!="error"){
        		$arrayNa = array();
	        	$i=0;
    	    	foreach ($usuarios as $key ) {
        			$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        								'tipo_roll' => $key['tipo_roll'],
        								'id_us' => $key['id_us'] );
        			$i++;
        		}
				$variables=array(
					'raiz' => RAIZ_SITIO.'admin=cargarAltas',
					'baja' => RAIZ_SITIO.'admin=baja',
					'logg' => RAIZ_SITIO.'admin=volverLogging',
					'lagg' => RAIZ_SITIO.'user=loginOut',
					'modi' => RAIZ_SITIO.'admin=cargarModificar',
					'probando' => $arrayNa );
				$this->cargarTemplate($templateDir,$vista,$variables);
			}
			else 
				echo "error en la base de datos";
		}
		else 
			echo "Usted no tiene permiso para entrar a esta area";
	}

	function alta(){
    		if (validarsesion($this->id())){
				$nom=$_POST['nombre'];
				$con=$_POST['contrasena'];
				$tipo=$_POST['tipo'];
				$res=false;
				if (cualquieraDeLasDos($nom) AND cualquieraDeLasDos($con)) {
					$res=true;
				}
				if ( $res ) {
					$obt=verificarNombre($nom);
					if ( $obt !="error" ){
						if ( ! isset($obt['nombre'])) {
							$cont=hash('sha256', $con);
							$cargar=cargarUsuario($nom, $cont, $tipo);
								if ( $cargar ) {
									if ($tipo==3){
						
									$labos=obtenerLaboratoriosDisponibles();
									$templateDir="../view/Administracion";
       								$vista="vistaAsignar.php";
       								$variables=array(
											'nombre' => $nom,
												'tipo' => $tipo,
													'labs' =>$labos,
														'raiz' => RAIZ_SITIO.'admin=asignarUsuarioLaboratorio',
															'confirm' => RAIZ_SITIO.'admin=altasybajas');
									}
									else{
									$templateDir="../view/Administracion";
       								$vista="vistaAltasyBajas.php";
       								$usuarios=obtenerUsuarios();
      	 							$arrayNa = array();
       								$i=0;
		       						foreach ($usuarios as $key ) {
        								$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        								'tipo_roll' => $key['tipo_roll'],
        								'id_us' => $key['id_us'] );
        								$i++;
        							}
									$variables=array(
									'raiz' => RAIZ_SITIO.'admin=cargarAltas',
									'baja' => RAIZ_SITIO.'admin=baja',
									'logg' => RAIZ_SITIO.'admin=volverLogging',
									'lagg' => RAIZ_SITIO.'user=loginOut',
									'modi' => RAIZ_SITIO.'admin=cargarModificar',
									'probando' => $arrayNa);
									}
								}
						} 
						else {
								$tipos=obtenerTipos();
								$templateDir="../view/Administracion";
    					    	$vista="cargarAltas.php";
    						    $variables=array(
								'nomTipos' => $tipos,
								'raiz' => RAIZ_SITIO.'admin=alta',
								'volver'=> RAIZ_SITIO.'admin=altasybajas',
								'error'=> 0);
							}
					} 
					else {
							$templateDir="../view/";
    	    				$vista="vistaError.php";
    	    				$variables=array(" ");
						}
			} 
			else {
					$tipos=obtenerTipos();
					$templateDir="../view/Administracion";
    	    		$vista="cargarAltas.php";
    	    		$variables=array(
					'nomTipos' => $tipos,
					'raiz' => RAIZ_SITIO.'admin=alta',
					'volver'=> RAIZ_SITIO.'admin=altasybajas');
					echo "<p>Error en la validacion de los datos, no debe haber espacios en blanco ni dejar campos vacios</p>";
				 }
			$this->cargarTemplate($templateDir,$vista,$variables);
		}
		else {
			echo "Usted no tiene permiso para acceder a esta area";
		}
	}
	function cargarAltas(){
		if(validarsesion($this->id())){
			$tipos=obtenerTipos();
			if ($tipos!="error"){
			$templateDir="../view/Administracion";
    	    $vista="cargarAltas.php";
    	    $variables=array(
			'nomTipos' => $tipos,
			'raiz' => RAIZ_SITIO.'admin=alta',
			'volver'=> RAIZ_SITIO.'admin=altasybajas');
			$this->cargarTemplate($templateDir,$vista,$variables);
			}
			else
				echo "error en la base de datos";
		}
	  else 
  		{ echo "No tenes permiso para entrar a esta area";
  		 }
 	}
	function baja(){
		if (validarsesion($this->id())){
			$id_us=$_POST['idusuario'];
			$tipo_us=$_POST['typeUser'];
			if ((soloDigitos($id_us)) AND soloDigitos($tipo_us)){
				$res=true;
			}
			if ($res){
				$eliminar=eliminarUsuario($id_us);
				if ( $eliminar ) {
					if ($tipo_us==3){
						
						$idLab=conseguirLabUserLab($id_us);
						desligarLab($idLab[0]);
					}
					$templateDir="../view/Administracion";
    	   			$vista="vistaAltasyBajas.php";
    	   			$usuarios=obtenerUsuarios();
    	   			$arrayNa = array();
    	   			$i=0;
   					foreach ($usuarios as $key ) {
    		  			$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        					'tipo_roll' => $key['tipo_roll'],
        					'id_us' => $key['id_us'] );
       					$i++;
      					}
					$variables=array(
						'raiz' => RAIZ_SITIO.'admin=cargarAltas',
						'baja' => RAIZ_SITIO.'admin=baja',
						'logg' => RAIZ_SITIO.'admin=volverLogging',
						'lagg' => RAIZ_SITIO.'user=loginOut',
						'modi' => RAIZ_SITIO.'admin=cargarModificar',
						'probando' => $arrayNa);
					$this->cargarTemplate($templateDir,$vista,$variables);
				}
				else {
				echo "No se pudo realizar la baja correctamente(error en la base de datos";
				}
			}
		 	else {
		 			$templateDir="../view/Administracion";
    	   			$vista="vistaAltasyBajas.php";
    	   			$usuarios=obtenerUsuarios();
    	   			$arrayNa = array();
    	   			$i=0;
   					foreach ($usuarios as $key ) {
    		  			$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        					'tipo_roll' => $key['tipo_roll'],
        					'id_us' => $key['id_us'] );
       					$i++;
      					}
					$variables=array(
						'raiz' => RAIZ_SITIO.'admin=cargarAltas',
						'baja' => RAIZ_SITIO.'admin=baja',
						'logg' => RAIZ_SITIO.'admin=volverLogging',
						'lagg' => RAIZ_SITIO.'user=loginOut',
						'modi' => RAIZ_SITIO.'admin=cargarModificar',
						'probando' => $arrayNa);
		 			echo "<p>Error en la validacion de los datos</p>";
		 			$this->cargarTemplate($templateDir,$vista,$variables);
		 	}
		}
		else {
			echo "Usted no tiene permiso para acceder a esta area";
		}
	}
	function cargarModificar(){
		if (validarsesion($this->id())){
			$id_us=$_POST['iduser'];
			if (soloDigitos($id_us)){
				$usuario=obtenerUsuario($id_us);
				if ($usuario){
					if (!($usuario['nombre']==$_SESSION['usuario'])){
						$tipos=obtenerTipos();
						$templateDir="../view/Administracion";
   		    			$vista="cargarBajas.php";
						$variables=array(
							'modificar' => RAIZ_SITIO.'admin=modificar',
							'usuarios' => $usuario,
							'volver'=> RAIZ_SITIO.'admin=altasybajas',
							'tipos' => $tipos);
						$this->cargarTemplate($templateDir,$vista,$variables);

					}
					else {
						$templateDir="../view/Administracion";
    		   		 	$vista="vistaAltasyBajas.php";
       				 	$usuarios=obtenerUsuarios();
       				 	$arrayNa = array();
    	    			$i=0;
        				foreach ($usuarios as $key ) {
    	    				$arrayNa[$i]=array('nombre' => $key['nombre'] ,
       									'tipo_roll' => $key['tipo_roll'],
       									'id_us' => $key['id_us'] );
    	   	 				$i++;
       					}
						$variables=array(
							'raiz' => RAIZ_SITIO.'admin=cargarAltas',
							'baja' => RAIZ_SITIO.'admin=baja',
							'logg' => RAIZ_SITIO.'admin=volverLogging',
							'lagg' => RAIZ_SITIO.'user=loginOut',
							'modi' => RAIZ_SITIO.'admin=cargarModificar',
							'error'=> 0,
							'probando' => $arrayNa);
						$this->cargarTemplate($templateDir,$vista,$variables);
						}
				}
				else {
					echo "error en la base de datos";
				}
			}
			else{
				$templateDir="../view/Administracion";
    		   	$vista="vistaAltasyBajas.php";
       		 	$usuarios=obtenerUsuarios();
      		 	$arrayNa = array();
       			$i=0;
      			foreach ($usuarios as $key ) {
    	    		$arrayNa[$i]=array('nombre' => $key['nombre'] ,
       							'tipo_roll' => $key['tipo_roll'],
       							'id_us' => $key['id_us'] );
   	 				$i++;
       			}
				$variables=array(
					'raiz' => RAIZ_SITIO.'admin=cargarAltas',
					'baja' => RAIZ_SITIO.'admin=baja',
					'logg' => RAIZ_SITIO.'admin=volverLogging',
					'lagg' => RAIZ_SITIO.'user=loginOut',
					'modi' => RAIZ_SITIO.'admin=cargarModificar',
					'error'=> 0,
					'probando' => $arrayNa);
				$this->cargarTemplate($templateDir,$vista,$variables);
			}
		}
			
		else {
			echo "Usted no tiene permisos para acceder a esta area";
		}
	}

	function modificar(){
		if (validarsesion($this->id())){
			$nombre=$_POST['usr'];
			$pass=$_POST['psw'];
			$roll=$_POST['tpr'];
			if ((cualquieraDeLasDos($pass)) AND (cualquieraDeLasDos($nombre)) AND (soloDigitos($roll))){
				$id_us=$_POST['iduser'];
				$datosUsuario=obtenerUsuario($id_us);
				if (!($pass==$datosUsuario['contrasena'])){
					 $password=hash('sha256', $pass);
				}
				else
				$password=$pass;
				$usuario=modificarUsuario($nombre,$password,$roll,$id_us);
				if ($usuario){
					$templateDir="../view/Administracion";
   					$vista="vistaAltasyBajas.php";
   	    			$usuarios=obtenerUsuarios();
   	    			$arrayNa = array();
   			   		$i=0;
   					foreach ($usuarios as $key ) {
   					   	$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        					'tipo_roll' => $key['tipo_roll'],
        					'id_us' => $key['id_us'] );
      					$i++;
      				}
					$variables=array(
						'raiz' => RAIZ_SITIO.'admin=cargarAltas',
						'baja' => RAIZ_SITIO.'admin=baja',
						'logg' => RAIZ_SITIO.'admin=volverLogging',
						'lagg' => RAIZ_SITIO.'user=loginOut',
						'modi' => RAIZ_SITIO.'admin=cargarModificar',
						'probando' => $arrayNa);
					$this->cargarTemplate($templateDir,$vista,$variables);
					}
					else {
						echo "error en la base de datos";
					}
				}	
				else {
					echo "<p>Error en la validacion de los datos</p>";
					echo "<p>".$roll."</p>";
					$templateDir="../view/Administracion";
   					$vista="vistaAltasyBajas.php";
   	    			$usuarios=obtenerUsuarios();
   	    			$arrayNa = array();
   			   		$i=0;
   					foreach ($usuarios as $key ) {
   					   	$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        					'tipo_roll' => $key['tipo_roll'],
        					'id_us' => $key['id_us'] );
      					$i++;
      				}
					$variables=array(
						'raiz' => RAIZ_SITIO.'admin=cargarAltas',
						'baja' => RAIZ_SITIO.'admin=baja',
						'logg' => RAIZ_SITIO.'admin=volverLogging',
						'lagg' => RAIZ_SITIO.'user=loginOut',
						'modi' => RAIZ_SITIO.'admin=cargarModificar',
						'probando' => $arrayNa);
					$this->cargarTemplate($templateDir,$vista,$variables);
				}
		}
		else {
			echo "Usted no tiene permiso para ingresar a esta area";
		}
	}
	function volverLogging(){
		if (validarsesion($this->id())){
			$templateDir="../view/Administracion";
   		    $vista="vistaAdmin.php";
			$variables=array(
							'raiz' => RAIZ_SITIO.'admin=altasybajas',
							'tablas' => RAIZ_SITIO.'admin=tablasreferencia',
							'parteFBA' => RAIZ_SITIO.'admin=cargarFBA',
							'parteLaboratorio' => RAIZ_SITIO.'admin=cargarLab',
							'logg' => RAIZ_SITIO.'user=loginOut',
							'nombreAdmin' => $_SESSION['usuario']);
			$this->cargarTemplate($templateDir,$vista,$variables);
		}
		else{
			echo "estoy re locooo";
		}
	}
	function altaTabla(){
			$iterar=$_POST['quesoy'];
			$nom=$_POST['nom'];
			$cod=$_POST['cod'];
			$tipo=$_POST['tip'];
			$cod=intval($cod);
			$tipoprueba=$_POST['tipoprub'];
			if ((minimoUnaLetra($nom)) AND (soloDigitos($cod)) AND (soloLetras($tipo))){
				switch ($iterar) {
					case 'Metodo':
							$prueba=verificarExistenciaMetodo($nom,$tipo);
							if (isset($prueba['nombre'])){
								echo "<p>Se encuentra un metodo existente para la misma prueba con dicho nombre en la base de datos</p>";
							}
							else{
							$verificacion=altaMetodo($nom,$tipo,$cod);
							}
						break;
					case 'Reactivo':
							$prueba=verificarExistenciaReactivo($nom,$tipo);
							if (isset($prueba['nombre'])){
								echo "<p>Se encuentra un reactivo existente para la misma prueba con dicho nombre en la base de datos</p>";
							}
							else{
							$verificacion=altaReactivo($nom,$tipo,$cod);
							}
						break;
					case 'Decision':
							$prueba=verificarExistenciaDecision($nom,$tipo);
							if (isset($prueba['nombre'])){
								echo "<p>Se encuentra un decision existente para la misma prueba con dicho nombre en la base de datos</p>";
							}
							else{
							$verificacion=altaDecision($nom,$tipo,$cod);
							}
						break;
					case 'Interpretacion':
							$prueba=verificarExistenciaInterpretacion($nom,$tipo);
							if (isset($prueba['nombre'])){
								echo "<p>Se encuentra una interpretacion existente para la misma prueba con dicho nombre en la base de datos</p>";
							}
						else{
							$verificacion=altaInterpretacion($nom,$tipo,$cod);
							}
						break;
					case 'Calibradores':
							$prueba=verificarExistenciaCalibrador($nom,$tipo);
							if (isset($prueba['nombre'])){
								echo "<p>Se encuentra un calibrador existente para la misma prueba con dicho nombre en la base de datos</p>";
							}
							else{
							$verificacion=altaCalibrador($nom,$tipo,$cod);
							}
						break;
					case 'PapelDeFiltro':
							$prueba=verificarExistenciaPapelDeFiltro($nom,$tipo);
							if (isset($prueba['nombre'])){
								echo "<p>Se encuentra un papel de filtro existente para la misma prueba con dicho nombre en la base de datos</p>";
							}
							else{
							$verificacion=altaPapelDeFiltro($nom,$tipo,$cod);
							}
						break;
					default:
							echo "error";
						break;
					}
					if (!isset($verificacion) AND (!isset($prueba))){
							echo "<p>error en la base de datos</p>";
					}
					else {
						$this -> cargaDinamicaGeneral($iterar,$tipoprueba);
					}
				}
				else {
						$this -> cargaDinamicaGeneral($iterar,$tipoprueba);
						echo "<p>Error en la validacion de los datos</p>";
				}
	}
	function bajaTabla(){
		$iterar=$_POST['quesoy1'];
		$id=$_POST['id1'];
		$tipoprueba=$_POST['tipoprub1'];
		if (soloDigitos($id)){
			switch ($iterar) {
				case 'Metodo':
						$verificacion=bajaMetodo($id);
					break;
				case 'Reactivo':
						$verificacion=bajaReactivo($id);
					break;
				case 'Decision':
						$verificacion=bajaDecision($id);
					break;
				case 'Interpretacion':
						$verificacion=bajaInterpretacion($id);
					break;
				case 'Calibradores':
						$verificacion=bajaCalibrador($id);
					break;
				case 'PapelDeFiltro':
						$verificacion=bajaPapelDeFiltro($id);
					break;
				default:
						echo "error";
					break;
			}
			if (!($verificacion)){
					echo "<p>error en la base de datos</p>";
			}
			else {
					$this -> cargaDinamicaGeneral($iterar,$tipoprueba);
			}
		}
		else {
			$this -> cargaDinamicaGeneral($iterar,$tipoprueba);
			echo "<p>Error en la validacion de los datos</p>";
		}
	}
	function cargarModificarGeneral(){
	 if(validarsesion($this->id())){
		$iterar=$_POST['quesoy2'];
		$id=$_POST['id2'];
		$tipoprueba=$_POST['tipoprub2'];

		$valorOriginal=$tipoprueba;
		switch ($tipoprueba) {
			case 'Phe':
				$tipoprueba='Fenilalanina';
				break;
			case 'IRT':
				$tipoprueba='Tripsina inmunorreactiva';
				break;
			case 'TSH':
				$tipoprueba='TSH';
				break;
			case 'Galactosa':
				$tipoprueba='Galactosa';
				break;	
			default:
					echo "error";
				break;
				}
		switch ($iterar) {
			case 'Metodo':
					$datos=conseguirDatosTablaMetodoEspecifico($tipoprueba,$id);
				break;
			case 'Reactivo':
					$datos=conseguirDatosTablaReactivoEspecifico($tipoprueba,$id);
				break;
			case 'Decision':
					$datos=conseguirDatosTablaDecisionEspecifico($tipoprueba,$id);
				break;
			case 'Interpretacion':
					$datos=conseguirDatosTablaInterpretacionEspecifico($tipoprueba,$id);
				break;
			case 'Calibradores':
					$datos=conseguirDatosTablaCalibradoresEspecifico($iterar,$id);
				break;
			case 'PapelDeFiltro':
					$datos=conseguirDatosTablaPapelDeFiltroEspecifico($iterar,$id);
				break;
			default:
					echo "error";
				break;
			}				
			if ($datos){
				$templateDir="../view/Administracion";
        		$vista="tipotab.php";
				$variables=array ('tipotab' => $datos,
											'quesoy' => $iterar,
												'tip_prub' => $valorOriginal,
												'modificar' => RAIZ_SITIO.'admin=modificarTabla',
													'logg' => RAIZ_SITIO.'admin=volverLogging',
													'lagg' => RAIZ_SITIO.'user=loginOut');
				$this->cargarTemplate($templateDir,$vista,$variables);
			}
			else {
				echo "error en la base de datos";
			}
		}
		else {
			echo "No ha iniciado sesión";
		}
	}
	function modificarTabla(){
		$iterar=$_POST['quesoy'];
		$tipoprub=$_POST['tipprub'];
		$nom=$_POST['nom'];
		$tip=$_POST['tip'];
		$cod=$_POST['cod'];
		$id=$_POST['id'];
		if ((minimoUnaLetra($nom)) AND (soloDigitos($cod)) AND (soloLetras($tip))){
		switch ($iterar) {
			case 'Metodo':
					$probandouno=obtenerMetodoPorId($id);
					$probandotres=obtenerMetodoTipoId($id);
					if (($probandouno[0]!=$nom) OR ($probandotres[0]!=$tip)){
						$pruebados=verificarExistenciaMetodo($nom,$tip);
					}
					if (isset($pruebados['nombre'])){
						echo "<p>Se encuentra un metodo existente para la misma prueba con dicho nombre en la base de datos</p>";
					}
					else{
					$verificacion=ModificarMetodo($nom,$tip,$cod,$id);
					}
				break;
			case 'Reactivo':
					$probandouno=obtenerReactivoPorId($id);
					$probandotres=obtenerReactivoTipoId($id);
					if (($probandouno[0]!=$nom) OR ($probandotres[0]!=$tip)){
						$pruebados=verificarExistenciaReactivo($nom,$tip);
					}
					if (isset($pruebados['nombre'])){
						echo "<p>Se encuentra un reactivo existente para la misma prueba con dicho nombre en la base de datos</p>";
					}
					else{
					$verificacion=ModificarReactivo($nom,$tip,$cod,$id);
					}
				break;
			case 'Decision':
					$probandouno=obtenerDesicionPorId($id);
					$probandotres=obtenerDecisionTipoId($id);
					if (($probandouno[0]!=$nom) OR ($probandotres[0]!=$tip)){
						$pruebados=verificarExistenciaDecision($nom,$tip);
					}
					if (isset($pruebados['nombre'])){
						echo "<p>Se encuentra un decision existente para la misma prueba con dicho nombre en la base de datos</p>";
					}
					else{
					$verificacion=ModificarDecision($nom,$tip,$cod,$id);
					}
				break;
			case 'Interpretacion':
					$probandouno=obtenerInterpretacionPorId($id);
					$probandotres=obtenerInterpretacionTipoId($id);
					if (($probandouno[0]!=$nom) OR ($probandotres[0]!=$tip)){
						$pruebados=verificarExistenciaInterpretacion($nom,$tip);
					}
					if (isset($pruebados['nombre'])){
						echo "<p>Se encuentra un interpretacion existente para la misma prueba con dicho nombre en la base de datos</p>";
					}
					else{
					$verificacion=ModificarInterpretacion($nom,$tip,$cod,$id);
					}
				break;
			case 'Calibradores':
					$probandotres=obtenerCalYPapelTipoId($id);
					$probandouno=obtenerCalibradorPorId($id);
					if (($probandouno[0]!=$nom) OR ($probandotres[0]!=$tip)){
						$pruebados=verificarExistenciaCalibrador($nom,$tip);
					}
					if (isset($pruebados['nombre'])){
						echo "<p>Se encuentra un calibrador existente para la misma prueba con dicho nombre en la base de datos</p>";
					}
					else{
					$verificacion=ModificarCalibradores($nom,$tip,$cod,$id);
					}
				break;
			case 'PapelDeFiltro':
					$probandotres=obtenerCalYPapelTipoId($id);
					$probandouno=obtenerPapelPorId($id);
					if (($probandouno[0]!=$nom) OR ($probandotres[0]!=$tip)){
						$pruebados=verificarExistenciaPapelDeFiltro($nom,$tip);
					}
					if (isset($pruebados['nombre'])){
						echo "<p>Se encuentra un papel de filtro existente para la misma prueba con dicho nombre en la base de datos</p>";
					}
					else{
					$verificacion=ModificarPapelDeFiltro($nom,$tip,$cod,$id);
					}
				break;
			default:
					echo "error";
				break;
			}
			if (!isset($verificacion) AND (!isset($pruebados))){
					echo "<p>error en la base de datos</p>";
			}
			else {
					$this -> cargaDinamicaGeneral($iterar,$tipoprub);
			}
		}
		else {
			$this-> cargaDinamicaGeneral($iterar,$tipoprub);
			echo "<p>Error en la validacion de los datos</p>";
		}
	}
	function asignarUsuarioLaboratorio(){
		if (validarsesion($this->id())){
			$labName=$_POST['nombrelab'];
			$nombreUsu=$_POST['nombreUsur'];
			$idUsur=obtenerIdUsuario($nombreUsu);
			$idLab=obtenerIdLab($labName);
			if (isset($idUsur[0])){
				asignarUsuarioLab($idUsur[0],$idLab[0]);
				$templateDir="../view/Administracion";
	    	    $vista="vistaAltasyBajas.php";
    		    $usuarios=obtenerUsuarios();
        		$arrayNa = array();
	       		$i=0;
    	   		foreach ($usuarios as $key ) {
        			$arrayNa[$i]=array('nombre' => $key['nombre'] ,
        								'tipo_roll' => $key['tipo_roll'],
        								'id_us' => $key['id_us'] );
        			$i++;
        		}
				$variables=array(
					'raiz' => RAIZ_SITIO.'admin=cargarAltas',
					'baja' => RAIZ_SITIO.'admin=baja',
					'logg' => RAIZ_SITIO.'admin=volverLogging',
					'lagg' => RAIZ_SITIO.'user=loginOut',
					'modi' => RAIZ_SITIO.'admin=cargarModificar',
					'probando' => $arrayNa );
				$this->cargarTemplate($templateDir,$vista,$variables);
			}
			else{
				echo "error en la base de datos";
			}
		}	
		else {
			echo "No tenes permiso para ver esto";
		}
	}
}
?>

