<?php

namespace Portafolio\PageBundle\Entity;

/**
 * Tabla de viajes que vende una agencia y compra un viajero
 */
class viajes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $origen;

    /**
     * @var string
     */
    private $destino;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $numero_plaza;

    /**
     * @var string
     */
    private $otros;

    /**
     * @var \Portafolio\PageBundle\Entity\agencia
     */
    private $agencia;

    /**
     * @var \Portafolio\PageBundle\Entity\viajero
     */
    private $viajero;


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
     * Set origen
     *
     * @param string $origen
     *
     * @return viajes
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return string
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set destino
     *
     * @param string $destino
     *
     * @return viajes
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return viajes
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return viajes
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return viajes
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
     * Set numeroPlaza
     *
     * @param integer $numeroPlaza
     *
     * @return viajes
     */
    public function setNumeroPlaza($numeroPlaza)
    {
        $this->numero_plaza = $numeroPlaza;

        return $this;
    }

    /**
     * Get numeroPlaza
     *
     * @return integer
     */
    public function getNumeroPlaza()
    {
        return $this->numero_plaza;
    }

    /**
     * Set otros
     *
     * @param string $otros
     *
     * @return viajes
     */
    public function setOtros($otros)
    {
        $this->otros = $otros;

        return $this;
    }

    /**
     * Get otros
     *
     * @return string
     */
    public function getOtros()
    {
        return $this->otros;
    }

    /**
     * Set agencia
     *
     * @param \Portafolio\PageBundle\Entity\agencia $agencia
     *
     * @return viajes
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
     * Set viajero
     *
     * @param \Portafolio\PageBundle\Entity\viajero $viajero
     *
     * @return viajes
     */
    public function setViajero(\Portafolio\PageBundle\Entity\viajero $viajero = null)
    {
        $this->viajero = $viajero;

        return $this;
    }

    /**
     * Get viajero
     *
     * @return \Portafolio\PageBundle\Entity\viajero
     */
    public function getViajero()
    {
        return $this->viajero;
    }

    /**
     * Metodo para asignar los atributos de la clase viaje
     *
     * @param $viajero
     * @param $agencia
     * @param $data
     */
    public function assignDataViaje($viajero, $agencia, $data)
    {
        $this->nombre = $data['nombre_viaje'];
        $this->codigo = $data['codigo'];
        $this->destino = $data['destino'];
        $this->origen = $data['origen'];
        $this->fecha = new \DateTime($data['fecha']);
        $this->numero_plaza = $data['numero_plaza'];
        $this->otros = $data['otros'];
        $this->agencia = $agencia;
        $this->viajero = $viajero;
    }

    /**
     * Funcion para retornar el objeto en forma de array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "codigo" => $this->codigo,
            "destino" => $this->destino,
            "origen" => $this->origen,
            "fecha" => $this->fecha->format('Y-m-d'),
            "numero_plaza" => $this->numero_plaza,
            "otros" => $this->otros,
            "viajero" => $this->viajero->getCedula(),
        ];
    }
}

