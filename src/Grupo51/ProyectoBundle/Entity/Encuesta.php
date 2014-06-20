<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encuesta
 *
 * @ORM\Table(name="encuesta")
 * @ORM\Entity
 */
class Encuesta
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
     */
    private $fechaFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_metodo", type="integer", nullable=false)
     */
    private $idMetodo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_reactivo", type="integer", nullable=false)
     */
    private $idReactivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_calibrador", type="integer", nullable=false)
     */
    private $idCalibrador;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_papel", type="integer", nullable=false)
     */
    private $idPapel;

    /**
     * @var integer
     *
     * @ORM\Column(name="valor_corte", type="integer", nullable=false)
     */
    private $valorCorte;

    /**
     * @var integer
     *
     * @ORM\Column(name="res_control_muestra1", type="integer", nullable=false)
     */
    private $resControlMuestra1;

    /**
     * @var integer
     *
     * @ORM\Column(name="res_control_muestra2", type="integer", nullable=false)
     */
    private $resControlMuestra2;

    /**
     * @var integer
     *
     * @ORM\Column(name="interpretacion_contro_muestra1", type="integer", nullable=false)
     */
    private $interpretacionControMuestra1;

    /**
     * @var integer
     *
     * @ORM\Column(name="interpretacion_contro_muestra2", type="integer", nullable=false)
     */
    private $interpretacionControMuestra2;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text", nullable=false)
     */
    private $comentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="decision_control_muestra1", type="integer", nullable=false)
     */
    private $decisionControlMuestra1;

    /**
     * @var integer
     *
     * @ORM\Column(name="decision_control_muestra2", type="integer", nullable=false)
     */
    private $decisionControlMuestra2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_prueba", type="integer", nullable=false)
     */
    private $idPrueba;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_encuesta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEncuesta;



    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Encuesta
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio->format('d/m/Y');
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Encuesta
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin->format('d/m/Y');
    }

    /**
     * Set idMetodo
     *
     * @param integer $idMetodo
     * @return Encuesta
     */
    public function setIdMetodo($idMetodo)
    {
        $this->idMetodo = $idMetodo;

        return $this;
    }

    /**
     * Get idMetodo
     *
     * @return integer 
     */
    public function getIdMetodo()
    {
        return $this->idMetodo;
    }

    /**
     * Set idReactivo
     *
     * @param integer $idReactivo
     * @return Encuesta
     */
    public function setIdReactivo($idReactivo)
    {
        $this->idReactivo = $idReactivo;

        return $this;
    }

    /**
     * Get idReactivo
     *
     * @return integer 
     */
    public function getIdReactivo()
    {
        return $this->idReactivo;
    }

    /**
     * Set idCalibrador
     *
     * @param integer $idCalibrador
     * @return Encuesta
     */
    public function setIdCalibrador($idCalibrador)
    {
        $this->idCalibrador = $idCalibrador;

        return $this;
    }

    /**
     * Get idCalibrador
     *
     * @return integer 
     */
    public function getIdCalibrador()
    {
        return $this->idCalibrador;
    }

    /**
     * Set idPapel
     *
     * @param integer $idPapel
     * @return Encuesta
     */
    public function setIdPapel($idPapel)
    {
        $this->idPapel = $idPapel;

        return $this;
    }

    /**
     * Get idPapel
     *
     * @return integer 
     */
    public function getIdPapel()
    {
        return $this->idPapel;
    }

    /**
     * Set valorCorte
     *
     * @param integer $valorCorte
     * @return Encuesta
     */
    public function setValorCorte($valorCorte)
    {
        $this->valorCorte = $valorCorte;

        return $this;
    }

    /**
     * Get valorCorte
     *
     * @return integer 
     */
    public function getValorCorte()
    {
        return $this->valorCorte;
    }

    /**
     * Set resControlMuestra1
     *
     * @param integer $resControlMuestra1
     * @return Encuesta
     */
    public function setResControlMuestra1($resControlMuestra1)
    {
        $this->resControlMuestra1 = $resControlMuestra1;

        return $this;
    }

    /**
     * Get resControlMuestra1
     *
     * @return integer 
     */
    public function getResControlMuestra1()
    {
        return $this->resControlMuestra1;
    }

    /**
     * Set resControlMuestra2
     *
     * @param integer $resControlMuestra2
     * @return Encuesta
     */
    public function setResControlMuestra2($resControlMuestra2)
    {
        $this->resControlMuestra2 = $resControlMuestra2;

        return $this;
    }

    /**
     * Get resControlMuestra2
     *
     * @return integer 
     */
    public function getResControlMuestra2()
    {
        return $this->resControlMuestra2;
    }

    /**
     * Set interpretacionControMuestra1
     *
     * @param integer $interpretacionControMuestra1
     * @return Encuesta
     */
    public function setInterpretacionControMuestra1($interpretacionControMuestra1)
    {
        $this->interpretacionControMuestra1 = $interpretacionControMuestra1;

        return $this;
    }

    /**
     * Get interpretacionControMuestra1
     *
     * @return integer 
     */
    public function getInterpretacionControMuestra1()
    {
        return $this->interpretacionControMuestra1;
    }

    /**
     * Set interpretacionControMuestra2
     *
     * @param integer $interpretacionControMuestra2
     * @return Encuesta
     */
    public function setInterpretacionControMuestra2($interpretacionControMuestra2)
    {
        $this->interpretacionControMuestra2 = $interpretacionControMuestra2;

        return $this;
    }

    /**
     * Get interpretacionControMuestra2
     *
     * @return integer 
     */
    public function getInterpretacionControMuestra2()
    {
        return $this->interpretacionControMuestra2;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Encuesta
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set decisionControlMuestra1
     *
     * @param integer $decisionControlMuestra1
     * @return Encuesta
     */
    public function setDecisionControlMuestra1($decisionControlMuestra1)
    {
        $this->decisionControlMuestra1 = $decisionControlMuestra1;

        return $this;
    }

    /**
     * Get decisionControlMuestra1
     *
     * @return integer 
     */
    public function getDecisionControlMuestra1()
    {
        return $this->decisionControlMuestra1;
    }

    /**
     * Set decisionControlMuestra2
     *
     * @param integer $decisionControlMuestra2
     * @return Encuesta
     */
    public function setDecisionControlMuestra2($decisionControlMuestra2)
    {
        $this->decisionControlMuestra2 = $decisionControlMuestra2;

        return $this;
    }

    /**
     * Get decisionControlMuestra2
     *
     * @return integer 
     */
    public function getDecisionControlMuestra2()
    {
        return $this->decisionControlMuestra2;
    }

    /**
     * Set idPrueba
     *
     * @param integer $idPrueba
     * @return Encuesta
     */
    public function setIdPrueba($idPrueba)
    {
        $this->idPrueba = $idPrueba;

        return $this;
    }

    /**
     * Get idPrueba
     *
     * @return integer 
     */
    public function getIdPrueba()
    {
        return $this->idPrueba;
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
  
}
