<?php

namespace Grupo51\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PruebaLaboratorio
 *
 * @ORM\Table(name="prueba_laboratorio")
 * @ORM\Entity
 */
class PruebaLaboratorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_prueba", type="integer", nullable=false)
     */
    private $idPrueba;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_laboratorio", type="integer", nullable=false)
     */
    private $idLaboratorio;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_prueba_laboratorio", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPruebaLaboratorio;



    /**
     * Set idPrueba
     *
     * @param integer $idPrueba
     * @return PruebaLaboratorio
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
     * Set idLaboratorio
     *
     * @param integer $idLaboratorio
     * @return PruebaLaboratorio
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
     * Get idPruebaLaboratorio
     *
     * @return integer 
     */
    public function getIdPruebaLaboratorio()
    {
        return $this->idPruebaLaboratorio;
    }
}
