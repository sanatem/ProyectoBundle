<?php

namespace Grupo51\ProyectoBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LaboratorioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LaboratorioRepository extends EntityRepository
{
	
 public function findAllObtenerLaboratoriosParticipantes($id_encu)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT r.institucion, r.idLaboratorio, r.idUsuario
                FROM Grupo51ProyectoBundle:EncuestaLaboratorio el 
                INNER JOIN Grupo51ProyectoBundle:Laboratorio r 
                WHERE el.idEncuesta = :ide AND el.idLaboratorio=r.idLaboratorio ");
        $query->setParameters(array('ide'=>$id_encu));
        return $query->getResult();

    }

}








/*SELECT * FROM `laboratorio` as l
                                INNER JOIN `encuesta_laboratorio` as el on (el.id_laboratorio= l.id_laboratorio)
                                WHERE el.id_encuesta=:id_enc ");
"SELECT u FROM User u JOIN u.address a WHERE a.city = 'Berlin'"*/