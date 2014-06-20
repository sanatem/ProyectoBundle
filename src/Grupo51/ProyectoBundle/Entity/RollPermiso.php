<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RollPermiso
 *
 * @ORM\Table(name="roll_permiso")
 * @ORM\Entity
 */
class RollPermiso
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="id_roll", type="boolean")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idRoll;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_permiso", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPermiso;



    /**
     * Set idRoll
     *
     * @param boolean $idRoll
     * @return RollPermiso
     */
    public function setIdRoll($idRoll)
    {
        $this->idRoll = $idRoll;

        return $this;
    }

    /**
     * Get idRoll
     *
     * @return boolean 
     */
    public function getIdRoll()
    {
        return $this->idRoll;
    }

    /**
     * Set idPermiso
     *
     * @param integer $idPermiso
     * @return RollPermiso
     */
    public function setIdPermiso($idPermiso)
    {
        $this->idPermiso = $idPermiso;

        return $this;
    }

    /**
     * Get idPermiso
     *
     * @return integer 
     */
    public function getIdPermiso()
    {
        return $this->idPermiso;
    }
}
