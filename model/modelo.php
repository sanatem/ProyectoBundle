<?php
require_once("conexionBase.php");

function obtenerLaboratorios(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM laboratorio WHERE `estado`=0 ");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function eliminarLaboratorio($id_lab) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		$hoy=date('Y-m-d');
		 $query = $link->prepare("UPDATE `laboratorio`SET `estado`= 1, `fecha_baja`=:dat WHERE `id_laboratorio`= :Id_lab");
		 $res = $query->execute(array('Id_lab' => $id_lab,
		 								'dat' => $hoy));
	}else {
		$res= "error";
		
	}
	return $res;

 }


function modificarLaboratorio($insti, $codigoLab, $sector, $responsable, $tipoLab, $dir, $dir_correo, $empre, $codpost, $mail, $tel, $fechapart, $pais, $ciudad, $idus, $estado, $idlab){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `laboratorio` 
		 							SET `codigo_lab`=:codL,`institucion`=:inst,
		 							`sector`=:sec,`responsable`=:respo,`domicilio`=:dire,
		 							`domicilio_correspondensia`=:dir_correo,`tipo_de_laboratorio`=:tipoLab,
		 							`empresa`=:empre,`codigo_postal`=:codpo, `correo_electronico`=:mail, 
		 							`telefono`=:tel, `fecha_participacion`=:fecPar, `estado`=:esta, `id_ciudad`=:idciud,
		 							`id_pais`=:idpais
		 							WHERE id_laboratorio = :Idlab
		 							");
		 $res = $query->execute(array('codL'=> $codigoLab,
		 								'inst'=> $insti,
		 								'sec'=> $sector,
		 								'respo'=> $responsable,
		 								'dire'=> $dir,
		 								'dir_correo' => $dir_correo,
		 								'tipoLab' => $tipoLab,
		 								'empre' => $empre,
		 								'codpo' => $codpost,
		 								'mail' => $mail,
		 								'tel' => $tel,
		 								'fecPar' => $fechapart,
		 								'esta' => $estado,
		 								'idciud' => $ciudad,
		 								'idpais' => $pais,
		 								'Idlab' =>$idlab
 
		 							  ));
	}else {
		$res= "error";
		
	}
	return $res;
}
	function obtenertiposLab(){
		$link = conectarBaseDatos();
		if ($link != "error"){
			 $query = $link->prepare("SELECT * FROM tipo_laboratorio ");
			 $query->execute();
			 $res = $query->fetchAll();
	 
	}else {
			$res= "error";
		
	}
	return $res;

	}
	//Apartir de aca----
 
 function obtenerPruebas() {
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM tipo_prueba ");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
 }

 function obtenerPaises(){
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT codigo, nombre FROM pais ");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
 }
 function obtenerCiudades(){
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT id, nombre FROM ciudad ");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
 }

function obtenerUsFBAsinLab(){
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT a.id_us AS id_us, a.nombre AS nombre, r.nombre AS rolnombre
								FROM roll AS r
								INNER JOIN usuario AS a ON a.tipo_roll = r.id_roll
								WHERE (r.nombre= :Rollname) AND a.id_us NOT 
								IN (
								SELECT id_usuario
								FROM laboratorio)"
	 							);
	 	$query->execute(array('Rollname' => 'Laboratorio'));
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
 }
 function obtenerLaboratorio($cod){
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM laboratorio WHERE `codigo_lab`= :cod ");
	 	$query->execute(array('cod' => $cod ));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
 }
 function obtenerLaboratorioid($id){
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM laboratorio WHERE `id_laboratorio`= :id ");
	 	$query->execute(array('id' => $id ));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
 }
 function cargarLaboratorio($inst,$cod,$sector,$responsable,$tipoLab,$dir,$correspo,$empre,$codP,$mail,$tel,$fechaPar,$pais,$ciudad, $lat, $long){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		$hoy=date('Y-m-d') ;
		$est=0;
		 $query = $link->prepare("INSERT INTO `laboratorio`(`codigo_lab`, `institucion`, `sector`, `responsable`, `domicilio`, `domicilio_correspondensia`, `tipo_de_laboratorio`, `empresa`, `codigo_postal`, `correo_electronico`, `telefono`, `fecha_ingreso`, `fecha_participacion`,  `estado`, `id_ciudad`, `id_pais`, `latitud`, `longuitud`) 
									VALUES (:cod, :insti, :sec, :resp, :dom, :domcorr, :tipLa, :emp, :codp, :email, :tel, :fecI, :fechP, :esta, :idciud, :idpais, :lat, :long)
								");
		 $res = $query->execute(array('cod' => $cod,
								'insti' => $inst,
								'sec' => $sector,
								'resp'=> $responsable,
								'dom' => $dir,
								'domcorr'=>$correspo,
								'tipLa' => $tipoLab,
								'emp' => $empre,
								'codp' => $codP,
								'email' => $mail,
								'tel' => $tel,
								'fecI' => $hoy,
								 'fechP' => $fechaPar,
								 'esta' => $est,
								 'idciud' => $ciudad,
								 'idpais' => $pais,
								 'lat' => $lat,
								 'long'=> $long
								));

	}else {
		$res= "error";
		
	}
	return $res;
 }
 function cargarLaboratorioPrueba($idla, $opc){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("INSERT INTO `prueba_laboratorio`(`id_prueba`, `id_laboratorio`) VALUES (:Idprueba, :Idlab)");
		 $res = $query->execute(array('Idprueba' => $opc,
								'Idlab' => $idla )) ;
	}else {
		$res= "error";
		
	}
	return $res;
 }
 function obtenerPruebasLab($id_lab){
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM `prueba_laboratorio` WHERE `id_laboratorio`= :id ");
	 	$query->execute(array('id' => $id_lab ));
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;

 }
 function eliminarPruebasLab($id_lab){
 	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("DELETE FROM `prueba_laboratorio` WHERE  id_laboratorio= :id ");
	 	$res=$query->execute(array('id' => $id_lab ));
	 	
	 }else {
	 	$res= "error";
	 }
	 return $res;
 }
 function obtenerTodosLaboratorios(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM laboratorio");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function cambiarFech($id_lab){
	$link = conectarBaseDatos();
	if ($link != "error"){
		$hoy=date('Y-m-d');
		$baj="0000-00-00";
	 	$query = $link->prepare("UPDATE `laboratorio` SET `fecha_ingreso`=:hoy , `fecha_baja`=:baja WHERE id_laboratorio=:idla");
	 	$res=$query->execute(array('hoy' => $hoy,
	 							'baja' => $baj,
	 							'idla' => $id_lab
	 							));
	 	
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;

}
function obtenerInformes(){

}
function obtenerEncuestas(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM encuesta ");
	 $query->execute();
	 $res = $query->fetchAll();
	 
	}else {
		$res= "error";
		
	}
	return $res;
}
function nuevaEncuesta($feini,$fefin){
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("INSERT INTO `encuesta`(`fecha_inicio`, `fecha_fin`) VALUES (:fein, :fefin)" );
		 $res=$query->execute(array('fein' =>$feini ,
		 							 'fefin' => $fefin)
		 						);

	 }else {
		$res= "error";
		
	}
	return $res;
}
function ultimaEncuesta(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT MAX(`id_encuesta`) as id_encuesta  FROM `encuesta` ");
	 $query->execute();
	 $res = $query->fetch();
	 
	}else {
		$res= "error";
		
	}
	return $res;
}
function historial_lab($id_lab,$id_encuesta){
	$link = conectarBaseDatos();
	if ($link != "error"){
	  $hoy=date('Y-m-d');
	 $query = $link->prepare("INSERT INTO `historial_laboratorio`(`id_laboratorio`, `id_encuesta`, `fecha`) 
	 						VALUES (:idlab, :iden, :fec)");
	 $res=$query->execute(array('idlab' =>$id_lab,
	 							 'iden' => $id_encuesta,
	 							 'fec' => $hoy));

	}else {
		$res= "error";
		
	}
	return $res;
}
function obtenerTipoPrueba(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * 
								FROM  `tipo_prueba`");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
/*function obtenerMetodos($tip){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM `metodo` WHERE tipo=:tp");
	 	$query->execute(array('tp' => $tip ));
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}*/
/*function obtenerReactivos($tip){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM `reactivo` WHERE tipo = :tp");
	 	$query->execute(array('tp' => $tip ));
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}*/
function obtenerCalibradoresyPapelFiltro(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM `calibradoresypapeldefiltro` ");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerInterpretacion($tip){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM `interpretacion` WHERE tipo = :tip");
	 	$query->execute(array('tip' => $tip ));
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerDecision($tip){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM `decision` WHERE tipo = :tip ");
	 	$query->execute(array('tip' => $tip ));
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function agregarRespuestaEncuesta($met, $ret,$cal,$papel,$intera,$interb,$decisiona,$decisionb,$resul1,$resul2, $id_prueba, $corte, $coment){
	$link = conectarBaseDatos();
	if ($link != "error"){
		$fba=1;
	 	$query = $link->prepare("INSERT INTO `resultado`(`id_metodo`, `id_reactivo`, `id_calibrador`, `id_papel`,
	 							 `valor_corte`, `res_control_muestra1`, `res_control_muestra2`,
	 							  `interpretacion_control_muestra1`, `interpretacion_control_muestra2`,
	 							   `decision_control_muestra1`, `decision_control_muestra2`,`comentario`, `id_prueba`, `fba`)
								VALUES (:met,:rea,:cal,:papel,:corte,:resa,:resb,:intea,:inteb,:decia,:decib,:comen,:idpr, :fb)
								");
	 	$res=$query->execute(array('met' => $met,
	 								'rea' => $ret,
	 								'cal' => $cal,
	 								'papel' => $papel,
	 								'corte' => $corte,
	 								'resa' => $resul1,
	 								'resb' => $resul2,
	 								'intea' => $intera,
	 								'inteb' => $interb,
	 								'decia' => $decisiona,
	 								'decib' => $decisionb,
	 								'comen' => $coment,
	 								'idpr' => $id_prueba,
	 								'fb' => $fba
	 								 ));
	 	
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerLaboratoriosAsignarlesEncuestas( $fechin, $fechfin){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM `laboratorio` WHERE  `estado` =0 AND`fecha_participacion` BETWEEN :fein AND :fefin");
	 	$query->execute(array('fein' => $fechin,
	 							'fefin' => $fechfin ));
	 	$res=$query->fetchAll();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function setearEncuesta($id_laboratorio, $id_encuesta){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("INSERT INTO `encuesta_laboratorio`(`id_encuesta`, `id_laboratorio`) VALUES (:idenc, :idlab)");
	 	$res=$query->execute(array('idenc' => $id_encuesta, 
	 							'idlab' => $id_laboratorio
	 						  ));
	 	
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
//juanma

function obtenerLaboratoriosDisponibles()
{	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("SELECT * FROM laboratorio WHERE (id_usuario=0) AND (estado=0)");
		$query->execute();
		$res = $query->fetchAll();
		$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	

 }
 function conseguirLabUserLab($id){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("SELECT id_laboratorio FROM laboratorio INNER JOIN usuario ON (laboratorio.id_usuario=usuario.id_us) WHERE id_us=:ID");
		$query->execute(array('ID'=>$id));
		$res=$query->fetch();
		$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
 function desligarLab($id){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE laboratorio SET `id_usuario`=0 WHERE id_laboratorio=:ID");
		$res=$query->execute(array('ID'=> $id));
		$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
 function obtenerIdUsuario($name){
 	$link = conectarBaseDatos();
		if ($link != "error"){
			$query = $link->prepare("SELECT id_us FROM usuario WHERE nombre=:NAME AND `baja`=0");
			$query->execute(array('NAME'=> $name));
			$res = $query->fetch();
			$link=cerrarConexion();
		}else {
			$res= "error";
	}
	return $res;
 }
 function obtenerIdLab($name){
	$link = conectarBaseDatos();
		if ($link != "error"){
			$query = $link->prepare("SELECT id_laboratorio FROM laboratorio WHERE institucion=:NAME");
			$query->execute(array('NAME'=>$name));
			$res = $query->fetch();
			$link=cerrarConexion();
		}else {
			$res= "error";
	}
	return $res;
 }
function asignarUsuarioLab($idUser,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE laboratorio SET `id_usuario`=:IDuser WHERE id_laboratorio=:ID");
		$res=$query->execute(array('ID'=>$id,
									'IDuser' => $idUser));
		$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
function ModificarPapelDeFiltro($nom,$tipo,$cod,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `calibradoresypapeldefiltro` SET `nombre`=:Nombre, `tipo`=:Type, `codigo`=:Cod WHERE id_calibradoresypapel=:ID");
	 $res =$query->execute(array('ID' =>$id,
	 								'Nombre' => $nom,
	 									'Type' => $tipo,
	 										'Cod' =>$cod
									)); 
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function ModificarCalibradores($nom,$tipo,$cod,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `calibradoresypapeldefiltro` SET `nombre`=:Nombre, `tipo`=:Type, `codigo`=:Cod WHERE id_calibradoresypapel=:ID");
	 $res =$query->execute(array('ID' =>$id,
	 								'Nombre' => $nom,
	 									'Type' => $tipo,
	 										'Cod' =>$cod
									));
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function ModificarInterpretacion($nom,$tipo,$cod,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `interpretacion` SET `nombre`=:Nombre, `tipo`=:Type, `codigo`=:Cod WHERE id_interpretacion=:ID");
	 $res =$query->execute(array('ID' =>$id,
	 								'Nombre' => $nom,
	 									'Type' => $tipo,
	 										'Cod' =>$cod
									));
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function ModificarDecision($nom,$tipo,$cod,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `decision` SET `nombre`=:Nombre, `tipo`=:Type, `codigo`=:Cod WHERE id_decision=:ID");
	 $res =$query->execute(array('ID' =>$id,
	 								'Nombre' => $nom,
	 									'Type' => $tipo,
	 										'Cod' =>$cod
									));
	$link=cerrarConexion();									 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function ModificarReactivo($nom,$tipo,$cod,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `reactivo` SET `nombre`=:Nombre, `tipo`=:Type, `codigo`=:Cod WHERE id_reactivo=:ID");
	 $res =$query->execute(array('ID' =>$id,
	 								'Nombre' => $nom,
	 									'Type' => $tipo,
	 										'Cod' =>$cod
									));
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function ModificarMetodo($nom,$tipo,$cod,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `metodo` SET `nombre`=:Nombre, `tipo`=:Type, `codigo`=:Cod WHERE id_metodo=:ID");
	 $res =$query->execute(array('ID' =>$id,
	 								'Nombre' => $nom,
	 									'Type' => $tipo,
	 										'Cod' =>$cod
									)); 
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirTiposBases($q){
	$link = conectarBaseDatos();
	if ($link != "error"){
	$query = $link->prepare("SELECT * FROM metodo WHERE tipo= :Type");
	$query->execute(array('Type' => $q));
	$res = $query->fetchAll();
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaPapelDeFiltroEspecifico($q,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	$query = $link->prepare("SELECT * FROM calibradoresypapeldefiltro WHERE tipo= :Type AND `baja`=0 AND `id_calibradoresypapel`=:ID");
	$query->execute(array('ID' => $id,
	 	'Type' => $q));
	$res = $query->fetchAll();
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaCalibradoresEspecifico($q,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	$query = $link->prepare("SELECT * FROM calibradoresypapeldefiltro WHERE tipo= :Type AND `baja`=0 AND `id_calibradoresypapel`=:ID");
	$query->execute(array('ID' => $id,
	 	'Type' => $q));
	$res = $query->fetchAll();
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaDecisionEspecifico($q,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	$query = $link->prepare("SELECT * FROM decision WHERE tipo= :Type AND `baja`=0 AND `id_decision`=:ID");
	$query->execute(array('ID' => $id,
	 	'Type' => $q));
	$res = $query->fetchAll();
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaInterpretacionEspecifico($q,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM interpretacion WHERE tipo= :Type AND `baja`=0 AND `id_interpretacion`=:ID");
	 $query->execute(array('ID' => $id,
	 	'Type' => $q));
	 $res = $query->fetchAll();
	 $link=cerrarConexion();	 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaMetodoEspecifico($q,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM metodo WHERE tipo= :Type AND `baja`=0 AND `id_metodo`=:ID");
	 $query->execute(array('ID' => $id,
	 	'Type' => $q));
	 $res = $query->fetchAll();
	 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaReactivoEspecifico($q,$id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM reactivo WHERE tipo= :Type AND `baja`=0 AND `id_reactivo`=:ID");
	 $query->execute(array('ID' => $id,
	 	'Type' => $q));
	 $res = $query->fetchAll();
	 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function verificarExistenciaMetodo($nom,$tipo){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM metodo where `nombre` = :Nom AND `baja`=0 AND `tipo`=:TYPE");
	 	$query->execute(array( 'Nom' => $nom,
	 							'TYPE'=> $tipo)); 
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 	 
	}else {
	 	$res= "error";
	}
	 return $res;
}
function verificarExistenciaCalibrador($nom,$tipo){
		$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM calibradoresypapeldefiltro where `nombre` = :Nom AND `baja`=0 AND `tipo`=:TYPE");
	 	$query->execute(array( 'Nom' =>$nom,
	 							'TYPE'=>$tipo)); 
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 	 
	}else {
	 	$res= "error";
	}
	 return $res;
}
function verificarExistenciaDecision($nom,$tipo){	
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM decision where `nombre` = :Nom AND `baja`=0 AND `tipo`=:TYPE");
	 	$query->execute(array( 'Nom' =>$nom,
	 							'TYPE'=>$tipo)); 
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 	 
	}else {
	 	$res= "error";
	}
	 return $res;
}
function verificarExistenciaPapelDeFiltro($nom,$tipo){	
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM calibradoresypapeldefiltro where `nombre` = :Nom AND `baja`=0 AND `tipo`=:TYPE");
	 	$query->execute(array( 'Nom' =>$nom,
	 							'TYPE'=>$tipo));  
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 	 
	}else {
	 	$res= "error";
	}
	 return $res;
}
function verificarExistenciaInterpretacion($nom,$tipo){	
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM interpretacion where `nombre` = :Nom AND `baja`=0 AND `tipo`=:TYPE");
	 	$query->execute(array( 'Nom' =>$nom,
	 							'TYPE'=>$tipo)); 
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 	 
	}else {
	 	$res= "error";
	}
	 return $res;
}
function verificarExistenciaReactivo($nom,$tipo){	
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM reactivo where `nombre` = :Nom AND `baja`=0 AND `tipo`=:TYPE");
	 	$query->execute(array( 'Nom' =>$nom,
	 							'TYPE'=>$tipo)); 
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 	 
	}else {
	 	$res= "error";
	}
	 return $res;
}
function bajaPapelDeFiltro($id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `calibradoresypapeldefiltro` SET `baja`=1 WHERE id_calibradoresypapel=:ID");
	 $res =$query->execute(array('ID' =>$id,
									));
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function bajaCalibrador($id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `calibradoresypapeldefiltro` SET `baja`=1 WHERE id_calibradoresypapel=:ID");
	 $res =$query->execute(array('ID' =>$id,
									));
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function bajaInterpretacion($id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `interpretacion` SET `baja`=1` WHERE id_interpretacion=:ID");
	 $res =$query->execute(array('ID' =>$id,
									)); 
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function bajaDecision($id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `decision` SET `baja`=1 WHERE id_decision=:ID");
	 $res =$query->execute(array('ID' =>$id,
									)); 
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
function bajaReactivo($id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `reactivo` SET `baja`=1 WHERE id_reactivo=:ID");
	 $res =$query->execute(array('ID' =>$id,
									));
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function bajaMetodo($id){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("UPDATE `metodo` SET `baja`=1 WHERE id_metodo=:ID");
	 $res =$query->execute(array('ID' =>$id,
									)); 
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function altaCalibrador($nom,$tipo,$cod){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("INSERT INTO `calibradoresypapeldefiltro`(`tipo`, `nombre`, `codigo`) VALUES (:Type, :Nom, :Cod)");
	 $res =$query->execute(array('Nom' =>$nom,
	 		 				'Type' => $tipo,
	 						'Cod' => $cod));
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function altaMetodo($nom,$tipo,$cod){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("INSERT INTO `metodo`(`tipo`, `nombre`, `codigo`) VALUES (:Type, :Nom, :Cod)");
	 $res =$query->execute(array('Nom' =>$nom,
	 		 				'Type' => $tipo,
	 						'Cod' => $cod));
	 $link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function altaDecision($nom,$tipo,$cod){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("INSERT INTO `decision`(`tipo`, `nombre`, `codigo`) VALUES (:Type, :Nom, :Cod)");
	 $res =$query->execute(array('Nom' =>$nom,
	 		 				'Type' => $tipo,
	 						'Cod' => $cod));
	 $link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function altaInterpretacion($nom,$tipo,$cod){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("INSERT INTO `interpretacion`(`tipo`, `nombre`, `codigo`) VALUES (:Type, :Nom, :Cod)");
	 $res =$query->execute(array('Nom' =>$nom,
	 		 				'Type' => $tipo,
	 						'Cod' => $cod));
	 $link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function altaPapelDeFiltro($nom,$tipo,$cod){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("INSERT INTO `calibradoresypapeldefiltro`(`tipo`, `nombre`, `codigo`) VALUES (:Type, :Nom, :Cod)");
	 $res =$query->execute(array('Nom' =>$nom,
	 		 				'Type' => $tipo,
	 						'Cod' => $cod)); 
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function altaReactivo($nom,$tipo,$cod){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("INSERT INTO `reactivo`(`tipo`, `nombre`, `codigo`) VALUES (:Type, :Nom, :Cod)");
	 $res =$query->execute(array('Nom' =>$nom,
	 		 				'Type' => $tipo,
	 						'Cod' => $cod)); 
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaReactivo($q){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM reactivo WHERE tipo= :Type AND `baja`=0");
	 $query->execute(array(
	 	'Type' => $q));
	 $res = $query->fetchAll();
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaPapelDeFiltro($q){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM calibradoresypapeldefiltro WHERE tipo= :Type AND `baja`=0");
	 $query->execute(array(
	 	'Type' => $q));
	 $res = $query->fetchAll();
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaDecision($q){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM decision WHERE tipo= :Type AND `baja`=0");
	 $query->execute(array(
	 	'Type' => $q));
	 $res = $query->fetchAll();
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaCalibradores($q){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM calibradoresypapeldefiltro WHERE tipo= :Type AND `baja`=0");
	 $query->execute(array(
	 	'Type' => $q));
	 $res = $query->fetchAll();
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaInterpretacion($q){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM interpretacion WHERE tipo= :Type AND `baja`=0");
	 $query->execute(array(
	 	'Type' => $q));
	 $res = $query->fetchAll();
	 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirDatosTablaMetodos($q){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM metodo WHERE tipo= :Type AND `baja`=0");
	 $query->execute(array(
	 	'Type' => $q));
	 $res = $query->fetchAll();
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;
	
}
function conseguirTipoPrueba(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT nombre FROM tipo_prueba");
	 $query->execute();
	 $res = $query->fetchAll();
	$link=cerrarConexion(); 
	}else {
		$res= "error";
		
	}
	return $res;	
}

function logearse($us, $con) {
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM usuario WHERE nombre= :Nombre AND contrasena= :Contrasena AND baja=0");
	 $query->execute(array('Nombre' => $us,
							'Contrasena' => $con));
	 $res = $query->fetch();
	 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}
 function cargarUsuario($us, $con, $tipo) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("INSERT INTO `usuario`(`nombre`, `contrasena`, `tipo_roll`) VALUES (:Nombre, :Contrasena, :Tipo_roll)");
		 $res = $query->execute(array('Nombre' => $us,
								'Contrasena' => $con,
								'Tipo_roll' => $tipo)) ;
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

  }

function obtenerTipos(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM roll ");
	 $query->execute();
	 $res = $query->fetchAll();
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
function obtenerUsuario($us){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM usuario where `id_us` = :Idus");
	 	$query->execute(array('Idus' => $us)); 
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function verificarNombre($nom){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT nombre FROM usuario where `nombre` = :Nom AND `baja`=0");
	 	$query->execute(array( 'Nom' =>$nom)); 
	 	$res=$query->fetch();
	 	$link=cerrarConexion();
	 	 
	}else {
	 	$res= "error";
	}
	 return $res;
}

 function obtenerUsuarios(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`tipo_roll`,`id_us` FROM usuario WHERE `baja`=0");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
 function obtenerUsuariosBaja(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`tipo_roll`,`id_us` FROM usuario WHERE `baja`=1");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function eliminarUsuario($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `usuario`SET `baja`= 1 WHERE `id_us`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

 }
 //0800101222225
 function modificarUsuario($usu,$pwd,$rll,$id_us){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `usuario` SET `nombre`= :Usur, `contrasena`=:Pass, `tipo_roll`=:Roll WHERE `id_us`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us,
		 								'Usur' => $usu,
		 									'Pass' => $pwd,
		 										'Roll' => $rll));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
//mati
function obtenerLaboratorioPorId($us){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM laboratorio WHERE `id_usuario` = :Idus");
	 	$query->execute(array('Idus' => $us));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerEncuesta($lab){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$hoy=date('Y-m-d');
	 	$query = $link->prepare("SELECT  p.id_prueba, p.nombre, e.fecha_inicio AS fecha_inicio
	 							FROM  `encuesta` AS e 
	 							INNER JOIN `encuesta_laboratorio` AS el
	 							INNER JOIN `prueba_laboratorio` AS pl 
	 							INNER JOIN `tipo_prueba` AS p 
	 							ON e.id_encuesta = el.id_encuesta 
	 							AND el.id_laboratorio = pl.id_laboratorio 
	 							AND pl.id_prueba = p.id_prueba
	 							WHERE  pl.id_laboratorio = :lab 
	 							AND fecha_inicio <= :hoy 
	 							AND fecha_fin > :hoy");
	 	$query->execute(array('lab' => $lab['id_laboratorio'], 'hoy' => $hoy));
	 	$res=$query->fetchALL();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerMetodos($prueba){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	if ($prueba == "Phe"){
	 		$prueba = "Fenilalanina";
	 	}
	 	if ($prueba == "IRT"){
	 		$prueba = "Tripsina inmunorreactiva";
	 	}
	 	$query = $link->prepare("SELECT *
	 							FROM  `metodo` 
	 							WHERE  `tipo` = :Prueba");
	 	$query->execute(array('Prueba' => $prueba));
	 	$res=$query->fetchALL();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;	
}
function obtenerCalibradores(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT *
	 							FROM  `calibradoresypapeldefiltro` 
	 							WHERE  `tipo` = :tipo");
	 	$query->execute(array('tipo' => 'Calibradores' ));
	 	$res=$query->fetchALL();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerReactivos($prueba){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	if ($prueba == "Phe"){
	 		$prueba = "Fenilalanina";
	 	}
	 	if ($prueba == "IRT"){
	 		$prueba = "Tripsina inmunorreactiva";
	 	}
	 	$query = $link->prepare("SELECT  * 
	 							FROM  `reactivo`
	 							WHERE  `tipo` = :Prueba");
	 	$query->execute(array('Prueba' => $prueba ));
	 	$res=$query->fetchALL();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerPapeles(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT  *
	 							FROM  `calibradoresypapeldefiltro`
	 							WHERE  `tipo` = :tipo");
	 	$query->execute(array('tipo' => 'PapelDeFiltro' ));
	 	$res=$query->fetchALL();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerInterpretaciones($prueba){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	if ($prueba == "Phe"){
	 		$prueba = "Fenilalanina";
	 	}
	 	if ($prueba == "IRT"){
	 		$prueba = "Tripsina inmunorreactiva";
	 	}
	 	$query = $link->prepare("SELECT  *
	 							FROM  `interpretacion`
	 							WHERE  `tipo` = :Prueba");
	 	$query->execute(array('Prueba' => $prueba ));
	 	$res=$query->fetchALL();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerDesiciones($prueba){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	if ($prueba == "Phe"){
	 		$prueba = "Fenilalanina";
	 	}
	 	if ($prueba == "IRT"){
	 		$prueba = "Tripsina inmunorreactiva";
	 	}
	 	$query = $link->prepare("SELECT *
	 							FROM  `decision`
	 							WHERE  `tipo` = :Prueba");
	 	$query->execute(array('Prueba' => $prueba ));
	 	$res=$query->fetchALL();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}

function obtenerIdPrueba($prueba){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	if ($prueba == "Fenilalanina"){
	 		$prueba = "Phe";
	 	}
	 	if ($prueba == "Tripsina inmunorreactiva"){
	 		$prueba = "IRT";
	 	}
	 	$query = $link->prepare("SELECT id_prueba
	 							FROM  `tipo_prueba`
	 							WHERE  `nombre` = :Prueba");
	 	$query->execute(array('Prueba' => $prueba ));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function obtenerIdMetodo($metodo){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT id_metodo
	 							FROM  `metodo`
	 							WHERE  `nombre` = :item");
	 	$query->execute(array('item' => $metodo ));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}

function obtenerIdCalibrador($calibrador){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT id_calibradoresypapel
	 							FROM  `calibradoresypapeldefiltro`
	 							WHERE  `nombre` = :item AND `tipo` = :tipo");
	 	$query->execute(array('item' => $calibrador, 'tipo' => 'Calibradores'));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}

function obtenerIdReactivo($reactivo){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT id_reactivo
	 							FROM  `reactivo`
	 							WHERE  `nombre` = :item");
	 	$query->execute(array('item' => $reactivo ));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}

function obtenerIdPapel($papel){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT id_calibradoresypapel
	 							FROM  `calibradoresypapeldefiltro`
	 							WHERE  `nombre` = :item AND `tipo` = :tipo");
	 	$query->execute(array('item' => $papel, 'tipo' => 'PapelDeFiltro'));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}

function obtenerIdDesicion($decision){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT id_decision
	 							FROM  `decision`
	 							WHERE  `nombre` = :item");
	 	$query->execute(array('item' => $decision));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}

function obtenerIdInterpretacion($interpretacion){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT id_interpretacion
	 							FROM  `interpretacion`
	 							WHERE  `nombre` = :item");
	 	$query->execute(array('item' => $interpretacion));
	 	$res=$query->fetch();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function completarEncuesta($metodoA,$calibradorA,$reactivoA,$papelA,$interpretacion1A,
								$decision1A,$resultado1A,$interpretacion2A,$decision2A,$resultado2A,
								$metodoB,$calibradorB,$reactivoB,$papelB,$interpretacion1B,
								$decision1B,$resultado1B,$interpretacion2B,$decision2B,$resultado2B,
								$fechaAnalisis,$comentario,$cutA,$cutB,$pruebaA, $pruebaB,$fecha_inicio){
	$link = conectarBaseDatos();
	if ($link != "error"){
		$hoy=date('Y-m-d');
		$id_prueba=obtenerIdPrueba($pruebaA);
		
		$metodo = obtenerIdMetodo($metodoA);
		$calibrador = obtenerIdCalibrador($calibradorA);
		$reactivo = obtenerIdReactivo($reactivoA); 
		$papel = obtenerIdPapel($papelA);
		$decision1 = obtenerIdDesicion($decision1A);
		$decision2 = obtenerIdDesicion($decision2A);
		$interpretacion1 = obtenerIdInterpretacion($interpretacion1A);
		$interpretacion2 = obtenerIdInterpretacion($interpretacion2A);

		$query = $link->prepare("INSERT INTO `resultado` (`fecha_recepcion`, `fecha_analisis`, `fecha_ingreso`, `id_metodo`, `id_reactivo`,
		 							`id_calibrador`, `id_papel`, `valor_corte`, `res_control_muestra1`, `res_control_muestra2`,
		 							 `interpretacion_control_muestra1`, `interpretacion_control_muestra2`, `decision_control_muestra1`, `decision_control_muestra2`, 
		 							 `comentario`, `id_prueba`, `fba` )
		 						 VALUES (:fre, :fa, :fi, :im, :ir, :ic, :ip, :vc, :rcm1, :rcm2, :icm1, :icm2,
		 						 	:dcm1, :dcm2, :com, :idp, :fba )");
		 $res = $query->execute(array('im' => $metodo[0],'ic' => $calibrador[0],'ir' => $reactivo[0],'ip' => $papel[0],'icm1' => $interpretacion1[0],
								'dcm1' => $decision1[0],'rcm1' => $resultado1A,'icm2' => $interpretacion2[0],'dcm2' => $decision2[0],'rcm2' =>$resultado2A,
								'fa' => $fechaAnalisis,'com' => $comentario, 'fre' => $fecha_inicio,'fi' => $hoy, 'vc' => $cutA, 'idp' => $id_prueba[0], 'fba' => "0"));
		
		$id_prueba=obtenerIdPrueba($pruebaB);
		$metodo = obtenerIdMetodo($metodoB);
		$calibrador = obtenerIdCalibrador($calibradorB);
		$reactivo = obtenerIdReactivo($reactivoB);
		$papel = obtenerIdPapel($papelB);
		$decision1 = obtenerIdDesicion($decision1B);
		$decision2 = obtenerIdDesicion($decision2B);
		$interpretacion1 = obtenerIdInterpretacion($interpretacion1B);
		$interpretacion2 = obtenerIdInterpretacion($interpretacion2B);

		$query = $link->prepare("INSERT INTO `resultado` (`fecha_recepcion`, `fecha_analisis`, `fecha_ingreso`, `id_metodo`, `id_reactivo`,
		 							`id_calibrador`, `id_papel`, `valor_corte`, `res_control_muestra1`, `res_control_muestra2`,
		 							 `interpretacion_control_muestra1`, `interpretacion_control_muestra2`, `decision_control_muestra1`, `decision_control_muestra2`, 
		 							 `comentario`, `id_prueba`, fba )
		 						 VALUES (:fre, :fa, :fi, :im, :ir, :ic, :ip, :vc, :rcm1, :rcm2, :icm1, :icm2,
		 						 	:dcm1, :dcm2, :com, :idp, :fba )");
		 $res = $query->execute(array('im' => $metodo[0],'ic' => $calibrador[0],'ir' => $reactivo[0],'ip' => $papel[0],'icm1' => $interpretacion1[0],
								'dcm1' => $decision1[0],'rcm1' => $resultado1B,'icm2' => $interpretacion2[0],'dcm2' => $decision2[0],'rcm2' =>$resultado2B,
								'fa' => $fechaAnalisis,'com' => $comentario, 'fre' => $fecha_inicio,'fi' => $hoy, 'vc' => $cutB, 'idp' => $id_prueba[0], 'fba' => "0"));						


}
}
function obtenerFecha($encuesta){
	foreach ($encuesta as $en) {
		$fecha=$en['2'];
	}
	return $fecha;
}

function modLaboratorio($codigo_lab,$institucion,$sector,
						$responsable,$domicilio,$domicilio_correspondensia,
						$tipo_de_laboratorio,$empresa,$codigo_postal,
						$correo_electronico,$telefono,$id_us){
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `laboratorio`SET `codigo_lab`= :cod,
		 											 `institucion`= :ins,
		 											 `sector`= :sec,
		 											 `responsable`= :res,
		 											 `domicilio`= :dom,
		 											 `domicilio_correspondensia`= :domc,
		 											 `tipo_de_laboratorio`= :tip,
		 											 `empresa`= :emp,
		 											 `codigo_postal`= :codp,
		 											 `correo_electronico`= :cor,
		 											 `telefono`= :tel
		 											WHERE `id_usuario`= :Id_us");
		 $res = $query->execute(array('cod' => $codigo_lab,
		 							'ins' => $institucion,'sec' => $sector,
		 							'res' => $responsable,'dom' => $domicilio,
		 							'domc' => $domicilio_correspondensia,'tip' => $tipo_de_laboratorio,
		 							'emp' => $empresa,'codp' => $codigo_postal,
		 							'cor' => $correo_electronico,'tel' => $telefono, 'Id_us' => $id_us ));
}
}