<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultado
 *
 * @ORM\Table(name="resultado")
 * @ORM\Entity(repositoryClass="Grupo51\ProyectoBundle\Repository\ResultadoRepository")
 */
class Resultado
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recepcion", type="date", nullable=false)
     */
    private $fechaRecepcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_analisis", type="date", nullable=false)
     */
    private $fechaAnalisis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date", nullable=false)
     */
    private $fechaIngreso;

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
     * @ORM\Column(name="interpretacion_control_muestra1", type="integer", nullable=false)
     */
    private $interpretacionControlMuestra1;

    /**
     * @var integer
     *
     * @ORM\Column(name="interpretacion_control_muestra2", type="integer", nullable=false)
     */
    private $interpretacionControlMuestra2;

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
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=700, nullable=false)
     */
    private $comentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_prueba", type="integer", nullable=false)
     */
    private $idPrueba;

    /**
     * @var integer
     *
     * @ORM\Column(name="fba", type="integer", nullable=false)
     */
    private $fba;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_encuesta", type="integer", nullable=false)
     */
    private $idEncuesta;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_resultado", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResultado;



    /**
     * Set fechaRecepcion
     *
     * @param \DateTime $fechaRecepcion
     * @return Resultado
     */
    public function setFechaRecepcion($fechaRecepcion)
    {
        $this->fechaRecepcion = $fechaRecepcion;

        return $this;
    }

    /**
     * Get fechaRecepcion
     *
     * @return \DateTime 
     */
    public function getFechaRecepcion()
    {
        return $this->fechaRecepcion;
    }

    /**
     * Set fechaAnalisis
     *
     * @param \DateTime $fechaAnalisis
     * @return Resultado
     */
    public function setFechaAnalisis($fechaAnalisis)
    {
        $this->fechaAnalisis = $fechaAnalisis;

        return $this;
    }

    /**
     * Get fechaAnalisis
     *
     * @return \DateTime 
     */
    public function getFechaAnalisis()
    {
        return $this->fechaAnalisis;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return Resultado
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set idMetodo
     *
     * @param integer $idMetodo
     * @return Resultado
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
     * @return Resultado
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
     * @return Resultado
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
     * @return Resultado
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
     * @return Resultado
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
     * @return Resultado
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
     * @return Resultado
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
     * Set interpretacionControlMuestra1
     *
     * @param integer $interpretacionControlMuestra1
     * @return Resultado
     */
    public function setInterpretacionControlMuestra1($interpretacionControlMuestra1)
    {
        $this->interpretacionControlMuestra1 = $interpretacionControlMuestra1;

        return $this;
    }

    /**
     * Get interpretacionControlMuestra1
     *
     * @return integer 
     */
    public function getInterpretacionControlMuestra1()
    {
        return $this->interpretacionControlMuestra1;
    }

    /**
     * Set interpretacionControlMuestra2
     *
     * @param integer $interpretacionControlMuestra2
     * @return Resultado
     */
    public function setInterpretacionControlMuestra2($interpretacionControlMuestra2)
    {
        $this->interpretacionControlMuestra2 = $interpretacionControlMuestra2;

        return $this;
    }

    /**
     * Get interpretacionControlMuestra2
     *
     * @return integer 
     */
    public function getInterpretacionControlMuestra2()
    {
        return $this->interpretacionControlMuestra2;
    }

    /**
     * Set decisionControlMuestra1
     *
     * @param integer $decisionControlMuestra1
     * @return Resultado
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
     * @return Resultado
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
     * Set comentario
     *
     * @param string $comentario
     * @return Resultado
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
     * Set idPrueba
     *
     * @param integer $idPrueba
     * @return Resultado
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
     * Set fba
     *
     * @param integer $fba
     * @return Resultado
     */
    public function setFba($fba)
    {
        $this->fba = $fba;

        return $this;
    }

    /**
     * Get fba
     *
     * @return integer 
     */
    public function getFba()
    {
        return $this->fba;
    }

    /**
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return Resultado
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idEncuesta
     *
     * @param integer $idEncuesta
     * @return Resultado
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
     * Get idResultado
     *
     * @return integer 
     */
    public function getIdResultado()
    {
        return $this->idResultado;
    }
}
