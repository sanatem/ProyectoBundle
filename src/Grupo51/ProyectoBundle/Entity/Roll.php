<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roll
 *
 * @ORM\Table(name="roll")
 * @ORM\Entity
 */
class Roll
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=15, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_roll", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRoll;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Roll
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
     * Get idRoll
     *
     * @return integer 
     */
    public function getIdRoll()
    {
        return $this->idRoll;
    }
}
