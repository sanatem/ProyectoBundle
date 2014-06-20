<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoLaboratorio
 *
 * @ORM\Table(name="tipo_laboratorio")
 * @ORM\Entity
 */
class TipoLaboratorio
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipolab", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipolab;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return TipoLaboratorio
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
     * Get idTipolab
     *
     * @return integer 
     */
    public function getIdTipolab()
    {
        return $this->idTipolab;
    }
}
