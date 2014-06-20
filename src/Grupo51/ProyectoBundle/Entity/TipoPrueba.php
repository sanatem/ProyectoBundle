<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoPrueba
 *
 * @ORM\Table(name="tipo_prueba")
 * @ORM\Entity(repositoryClass="Grupo51\ProyectoBundle\Repository\TipoPruebaRepository")
 */
class TipoPrueba
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
     * @ORM\Column(name="id_prueba", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPrueba;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return TipoPrueba
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
     * Get idPrueba
     *
     * @return integer 
     */
    public function getIdPrueba()
    {
        return $this->idPrueba;
    }
}
