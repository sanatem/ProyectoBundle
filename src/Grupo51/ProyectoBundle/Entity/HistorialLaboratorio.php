<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistorialLaboratorio
 *
 * @ORM\Table(name="historial_laboratorio")
 * @ORM\Entity
 */
class HistorialLaboratorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_laboratorio", type="integer", nullable=false)
     */
    private $idLaboratorio;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_encuesta", type="integer", nullable=false)
     */
    private $idEncuesta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_historial", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistorial;



    /**
     * Set idLaboratorio
     *
     * @param integer $idLaboratorio
     * @return HistorialLaboratorio
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

    /**
     * Set idEncuesta
     *
     * @param integer $idEncuesta
     * @return HistorialLaboratorio
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return HistorialLaboratorio
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return HistorialLaboratorio
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Get idHistorial
     *
     * @return integer 
     */
    public function getIdHistorial()
    {
        return $this->idHistorial;
    }
}
