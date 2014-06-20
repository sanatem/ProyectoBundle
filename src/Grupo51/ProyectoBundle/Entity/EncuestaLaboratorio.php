<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EncuestaLaboratorio
 *
 * @ORM\Table(name="encuesta_laboratorio")
 * @ORM\Entity(repositoryClass="Grupo51\ProyectoBundle\Repository\EncuestaLaboratorioRepository")
 */
class EncuestaLaboratorio
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="inicial", type="boolean", nullable=false)
     */
    private $inicial;

    /**
     * @var integer
     *
     * @ORM\Column(name="final", type="integer", nullable=false)
     */
    private $final;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_encuesta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idEncuesta;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_laboratorio", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idLaboratorio;



    /**
     * Set inicial
     *
     * @param boolean $inicial
     * @return EncuestaLaboratorio
     */
    public function setInicial($inicial)
    {
        $this->inicial = $inicial;

        return $this;
    }

    /**
     * Get inicial
     *
     * @return boolean 
     */
    public function getInicial()
    {
        return $this->inicial;
    }

    /**
     * Set final
     *
     * @param integer $final
     * @return EncuestaLaboratorio
     */
    public function setFinal($final)
    {
        $this->final = $final;

        return $this;
    }

    /**
     * Get final
     *
     * @return integer 
     */
    public function getFinal()
    {
        return $this->final;
    }

    /**
     * Set idEncuesta
     *
     * @param integer $idEncuesta
     * @return EncuestaLaboratorio
     */
    public function setIdEncuesta($idEncuesta)
    {
        $this->idEncuesta = $idEncuesta;

        return $this;
    }

    /**
     * Get idEncuesta
     *
     * @return integer 
     */
    public function getIdEncuesta()
    {
        return $this->idEncuesta;
    }

    /**
     * Set idLaboratorio
     *
     * @param integer $idLaboratorio
     * @return EncuestaLaboratorio
     */
    public function setIdLaboratorio($idLaboratorio)
    {
        $this->idLaboratorio = $idLaboratorio;

        return $this;
    }

    /**
     * Get idLaboratorio
     *
     * @return integer 
     */
    public function getIdLaboratorio()
    {
        return $this->idLaboratorio;
    }

    
}
?>