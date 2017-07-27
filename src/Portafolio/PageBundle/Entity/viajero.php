<?php

namespace Portafolio\PageBundle\Entity;

/**
 * Tabla con los datos del viajero
 */
class viajero
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $cedula;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $telefono;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $viajes;

    /**
     * @var \Portafolio\PageBundle\Entity\agencia
     */
    private $agencia;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return viajero
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     *
     * @return viajero
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return viajero
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
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return viajero
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
     * Add viaje
     *
     * @param \Portafolio\PageBundle\Entity\viajes $viaje
     *
     * @return viajero
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

    /**
     * Set agencia
     *
     * @param \Portafolio\PageBundle\Entity\agencia $agencia
     *
     * @return viajero
     */
    public function setAgencia(\Portafolio\PageBundle\Entity\agencia $agencia = null)
    {
        $this->agencia = $agencia;

        return $this;
    }

    /**
     * Get agencia
     *
     * @return \Portafolio\PageBundle\Entity\agencia
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * Funcion para asignar los valores de los viajeros
     *
     * @param $data
     */
    public function assignDataViajero($data)
    {
        $this->cedula = isset($data['cedula']) ? $data['cedula'] : "V1";
        $this->direccion = isset($data['direccion']) ? $data['direccion'] : "n/a";
        $this->nombre = isset($data['nombre']) ? $data['nombre'] : "jane doe";
        $this->telefono = isset($data['telefono']) ? $data['telefono'] : 123456789;
    }
}

