<?php

namespace Portafolio\PageBundle\Entity;

/**
 * Tabla agencia con la informacion referente a ella
 */
class agencia
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $viajero;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $viajes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->viajero = new \Doctrine\Common\Collections\ArrayCollection();
        $this->viajes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return agencia
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
     * Add viajero
     *
     * @param \Portafolio\PageBundle\Entity\viajero $viajero
     *
     * @return agencia
     */
    public function addViajero(\Portafolio\PageBundle\Entity\viajero $viajero)
    {
        $this->viajero[] = $viajero;

        return $this;
    }

    /**
     * Remove viajero
     *
     * @param \Portafolio\PageBundle\Entity\viajero $viajero
     */
    public function removeViajero(\Portafolio\PageBundle\Entity\viajero $viajero)
    {
        $this->viajero->removeElement($viajero);
    }

    /**
     * Get viajero
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getViajero()
    {
        return $this->viajero;
    }

    /**
     * Add viaje
     *
     * @param \Portafolio\PageBundle\Entity\viajes $viaje
     *
     * @return agencia
     */
    public function addViaje(\Portafolio\PageBundle\Entity\viajes $viaje)
    {
        $this->viajes[] = $viaje;

        return $this;
    }

    /**
     * Remove viaje
     *
     * @param \Portafolio\PageBundle\Entity\viajes $viaje
     */
    public function removeViaje(\Portafolio\PageBundle\Entity\viajes $viaje)
    {
        $this->viajes->removeElement($viaje);
    }

    /**
     * Get viajes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getViajes()
    {
        return $this->viajes;
    }

    public function assignDataAgencia($data)
    {
        $this->nombre = isset($data['nombre']) ? $data['nombre'] : "jane doe";
    }
}

