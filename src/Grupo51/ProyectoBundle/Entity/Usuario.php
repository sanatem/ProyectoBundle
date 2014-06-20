<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=35, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="text", nullable=false)
     */
    private $contrasena;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo_roll", type="boolean", nullable=false)
     */
    private $tipoRoll;

    /**
     * @var boolean
     *
     * @ORM\Column(name="baja", type="boolean", nullable=false)
     */
    private $baja;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_us", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUs;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     * @return Usuario
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string 
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set tipoRoll
     *
     * @param boolean $tipoRoll
     * @return Usuario
     */
    public function setTipoRoll($tipoRoll)
    {
        $this->tipoRoll = $tipoRoll;

        return $this;
    }

    /**
     * Get tipoRoll
     *
     * @return boolean 
     */
    public function getTipoRoll()
    {
        return $this->tipoRoll;
    }

    /**
     * Set baja
     *
     * @param boolean $baja
     * @return Usuario
     */
    public function setBaja($baja)
    {
        $this->baja = $baja;

        return $this;
    }

    /**
     * Get baja
     *
     * @return boolean 
     */
    public function getBaja()
    {
        return $this->baja;
    }

    /**
     * Get idUs
     *
     * @return integer 
     */
    public function getIdUs()
    {
        return $this->idUs;
    }
}
