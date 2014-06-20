<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laboratorio
 *
 * @ORM\Table(name="laboratorio")
 * @ORM\Entity(repositoryClass="Grupo51\ProyectoBundle\Repository\LaboratorioRepository")
 */
class Laboratorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codigo_lab", type="integer", nullable=false)
     */
    private $codigoLab;

    /**
     * @var string
     *
     * @ORM\Column(name="institucion", type="string", length=30, nullable=false)
     */
    private $institucion;

    /**
     * @var string
     *
     * @ORM\Column(name="sector", type="string", length=30, nullable=false)
     */
    private $sector;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=30, nullable=false)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=30, nullable=false)
     */
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio_correspondensia", type="string", length=30, nullable=false)
     */
    private $domicilioCorrespondensia;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_de_laboratorio", type="integer", nullable=false)
     */
    private $tipoDeLaboratorio;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=30, nullable=false)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_postal", type="string", length=30, nullable=false)
     */
    private $codigoPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=30, nullable=false)
     */
    private $correoElectronico;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date", nullable=false)
     */
    private $fechaIngreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_participacion", type="date", nullable=false)
     */
    private $fechaParticipacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ciudad", type="integer", nullable=false)
     */
    private $idCiudad;

    /**
     * @var string
     *
     * @ORM\Column(name="id_pais", type="string", length=11, nullable=false)
     */
    private $idPais;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="date", nullable=true)
     */
    private $fechaBaja;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_encuesta", type="integer", nullable=true)
     */
    private $idEncuesta;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="text", nullable=false)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longuitud", type="text", nullable=false)
     */
    private $longuitud;

    /**
     * @var integer
     *
     * @ORM\Column(name="re-activo", type="integer", nullable=false)
     */
    private $reActivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_laboratorio", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLaboratorio;



    /**
     * Set codigoLab
     *
     * @param integer $codigoLab
     * @return Laboratorio
     */
    public function setCodigoLab($codigoLab)
    {
        $this->codigoLab = $codigoLab;

        return $this;
    }

    /**
     * Get codigoLab
     *
     * @return integer 
     */
    public function getCodigoLab()
    {
        return $this->codigoLab;
    }

    /**
     * Set institucion
     *
     * @param string $institucion
     * @return Laboratorio
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;

        return $this;
    }

    /**
     * Get institucion
     *
     * @return string 
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * Set sector
     *
     * @param string $sector
     * @return Laboratorio
     */
    public function setSector($sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return string 
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     * @return Laboratorio
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Laboratorio
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set domicilioCorrespondensia
     *
     * @param string $domicilioCorrespondensia
     * @return Laboratorio
     */
    public function setDomicilioCorrespondensia($domicilioCorrespondensia)
    {
        $this->domicilioCorrespondensia = $domicilioCorrespondensia;

        return $this;
    }

    /**
     * Get domicilioCorrespondensia
     *
     * @return string 
     */
    public function getDomicilioCorrespondensia()
    {
        return $this->domicilioCorrespondensia;
    }

    /**
     * Set tipoDeLaboratorio
     *
     * @param integer $tipoDeLaboratorio
     * @return Laboratorio
     */
    public function setTipoDeLaboratorio($tipoDeLaboratorio)
    {
        $this->tipoDeLaboratorio = $tipoDeLaboratorio;

        return $this;
    }

    /**
     * Get tipoDeLaboratorio
     *
     * @return integer 
     */
    public function getTipoDeLaboratorio()
    {
        return $this->tipoDeLaboratorio;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Laboratorio
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return Laboratorio
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Laboratorio
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Laboratorio
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return Laboratorio
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
     * Set fechaParticipacion
     *
     * @param \DateTime $fechaParticipacion
     * @return Laboratorio
     */
    public function setFechaParticipacion($fechaParticipacion)
    {
        $this->fechaParticipacion = $fechaParticipacion;

        return $this;
    }

    /**
     * Get fechaParticipacion
     *
     * @return \DateTime 
     */
    public function getFechaParticipacion()
    {
        return $this->fechaParticipacion;
    }

    /**
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return Laboratorio
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
     * Set estado
     *
     * @param integer $estado
     * @return Laboratorio
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
     * Set idCiudad
     *
     * @param integer $idCiudad
     * @return Laboratorio
     */
    public function setIdCiudad($idCiudad)
    {
        $this->idCiudad = $idCiudad;

        return $this;
    }

    /**
     * Get idCiudad
     *
     * @return integer 
     */
    public function getIdCiudad()
    {
        return $this->idCiudad;
    }

    /**
     * Set idPais
     *
     * @param string $idPais
     * @return Laboratorio
     */
    public function setIdPais($idPais)
    {
        $this->idPais = $idPais;

        return $this;
    }

    /**
     * Get idPais
     *
     * @return string 
     */
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Laboratorio
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime 
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set idEncuesta
     *
     * @param integer $idEncuesta
     * @return Laboratorio
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
     * Set latitud
     *
     * @param string $latitud
     * @return Laboratorio
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longuitud
     *
     * @param string $longuitud
     * @return Laboratorio
     */
    public function setLonguitud($longuitud)
    {
        $this->longuitud = $longuitud;

        return $this;
    }

    /**
     * Get longuitud
     *
     * @return string 
     */
    public function getLonguitud()
    {
        return $this->longuitud;
    }

    /**
     * Set reActivo
     *
     * @param integer $reActivo
     * @return Laboratorio
     */
    public function setReActivo($reActivo)
    {
        $this->reActivo = $reActivo;

        return $this;
    }

    /**
     * Get reActivo
     *
     * @return integer 
     */
    public function getReActivo()
    {
        return $this->reActivo;
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
