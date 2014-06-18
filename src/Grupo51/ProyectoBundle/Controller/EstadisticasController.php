<?php

namespace Grupo51\ProyectoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EstadisticasController extends Controller
{
    public function estadisticasAction()
    {	
    	$em = $this->getDoctrine()->getManager();
    	$encuestas = $em->getRepository('Grupo51ProyectoBundle:Encuesta')-> findAll(); //obtener todas las encuestas
    	$cantLabParticipantes = array(); //cantidad de laboratorios que participaron en la encuesta
    	
    	$res=$this->getDoctrine()->getManager();
    	$pruebas=$res->getRepository('Grupo51ProyectoBundle:TipoPrueba')->findAllPruebas();
    	foreach ($encuestas as $en) {
    		$id_encu=$en->getIdEncuesta();
    		
    		$total=$res->getRepository('Grupo51ProyectoBundle:EncuestaLaboratorio')->findAllCantLabParticipantesEncu($id_encu);
    		$respuestas=$res->getRepository('Grupo51ProyectoBundle:Resultado')->findAllCantidadRespuObtenidas($id_encu);
    		$cantLabParticipantes[$id_encu]= $respuestas."/".$total;
    	}

        return $this->render('Grupo51ProyectoBundle:Estadisticas:estadisticas.html.twig', array('encuestas'=>$encuestas,
        																						'cantidadEncuestados'=>$cantLabParticipantes,
        																						'pruebas'=>$pruebas));
    }


    public function obtenerEstadisticaAction()
    {

    	$id_encu= $_POST['id_encuesta'];
    	$em=$this->getDoctrine()->getManager();
    	$labs=$em->getRepository('Grupo51ProyectoBundle:Laboratorio')->findAllObtenerLaboratoriosParticipantes($id_encu); //lab q participan
    	$i=0;
    	$em=$this->getDoctrine()->getManager();
		 	foreach ($labs as $key ) {
		 				
		 		$res=$em->getRepository('Grupo51ProyectoBundle:Resultado')->findByResultadosLaboratorio($key['idUsuario'] , $id_encu); //obtengo los resultados de un laboratorio
		 		if ($res !=null){

		 					# code...
		 				
				 				$recepcion=$res->getFechaRecepcion()->format('d/m/y');
				 				$analisis=$res->getFechaAnalisis()->format('d/m/y');
				 				$ingreso=$res->getFechaIngreso()->format('d/m/y');
								$datetime1 = \DateTime::createFromFormat('d/m/y', $recepcion); //tiempo envio
								$datetime2 = \DateTime::createFromFormat('d/m/y',$recepcion);
								$interval = $datetime1->diff($datetime2);
								$res= $interval->format('%a');				
								
								$datetime3 = \DateTime::createFromFormat('d/m/y', $recepcion); //tiempo analisis 
								$datetime4 = \DateTime::createFromFormat('d/m/y', $analisis);
								
								$interval1 = $datetime4->diff($datetime3);
								$resTA= $interval1->format('%a');

								$datetime5 = \DateTime::createFromFormat('d/m/y',$ingreso); //tiempo ingrese 
								$datetime6 = \DateTime::createFromFormat('d/m/y' ,$analisis);
								$interval2 = $datetime5->diff($datetime6);
								$resTI= $interval2->format('%a');

				 				if( $i == 0){
				 					$tiempoIn=$resTI;
				 					$tiempoTA=$resTA;
				 					$tiempo=$res;
				 					$lab=$key['institucion'];
				 				}else{
				 					$tiempoIn=$tiempoIn." ".$resTI;
				 					$tiempoTA=$tiempoTA." ".$resTA;
				 					$lab=$lab." ".$key['institucion'];
				 					$tiempo=$tiempo." ".$res;
				 				}
				 				
				}else{
					if( $i == 0){
				 		$tiempoIn='0';
				 		$tiempoTA='0';
				 		$tiempo='0';
				 		$lab=$key['institucion'];
				 	}else{
				 		$tiempoIn=$tiempoIn." ".'0';
				 		$tiempoTA=$tiempoTA." ".'0';
				 		$lab=$lab." ".$key['institucion'];
				 		$tiempo=$tiempo." ".'0';
				 		}
				}
		 		$i++;	
		 	}	
    	

    	return $this->render('Grupo51ProyectoBundle:Estadisticas:estadisticas2.html.twig', array(
    																								'labs' => $lab,
    																								'tiempo' => $tiempo,
																									'tiempoAn' => $tiempoTA,
																									'tiempoIn' => $tiempoIn,
    																							));

    }


}
/*
if($labs!="error"){
		 			$i=0;
		 			foreach ($labs as $key ) {
		 				$res=obtenerResultadodeLab($key['id_usuario'], $id_encu);
		 			
		 					# code...
		 				
				 				$recepcion=$res['fecha_recepcion'];
				 				$analisis=$res['fecha_analisis'];
				 				$ingreso=$res['fecha_ingreso'];
								
								$datetime1 = date_create($recepcion); //tiempo envio
								$datetime2 = date_create($recepcion);
								$interval = date_diff($datetime1, $datetime2);
								$res= $interval->format('%a');				

								$datetime3 = date_create($recepcion); //tiempo analisis 
								$datetime4 = date_create($analisis);
								$interval1 = date_diff($datetime3, $datetime4);
								$resTA= $interval1->format('%a');

								$datetime5 = date_create($ingreso); //tiempo ingrese 
								$datetime6 = date_create($analisis);
								$interval2 = date_diff($datetime5, $datetime6);
								$resTI= $interval2->format('%a');

				 				if( $i == 0){
				 					$tiempoIn=$resTI;
				 					$tiempoTA=$resTA;
				 					$tiempo=$res;
				 					$lab=$key['institucion'];
				 				}else{
				 					$tiempoIn=$tiempoIn." ".$resTI;
				 					$tiempoTA=$tiempoTA." ".$resTA;
				 					$lab=$lab." ".$key['institucion'];
				 					$tiempo=$tiempo." ".$res;
				 				}
				 				$i++;
		 				
		 			}	

,
																									


*/
?>




