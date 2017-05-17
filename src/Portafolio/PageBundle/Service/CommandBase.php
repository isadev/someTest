<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/13/17
 * Time: 2:29 PM
 */

namespace Portafolio\PageBundle\Service;

use Portafolio\PageBundle\Command\Command;

/**
 * Clase encargada de incluir los atributos y valores para la manipulacion en el handler
 *
 * Class CommandBase
 * @package Portafolio\PageBundle\Service
 */
class CommandBase implements Command
{
    /**
     * Constructor de la clase
     *
     * Command constructor.
     * @param $data
     * @author Isabel Nieto <isabelcnd@gmail.com>
     */
    public function __construct($data = null)
    {
        if (!empty($data) AND is_array($data)) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Get dinamico de la clase
     *
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->{$key};
    }

    /**
     * Set dinamico de la clase
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->{$key} = $value;
    }

    /**
     * Datos enviados desde el controller
     * @return mixed
     * @author Isabel Nieto <isabelcnd@gmail.com>
     */
    public function getRequest()
    {
        $array_response = [];

        foreach ($this as $key => $value) {
                $array_response["$key"] = $value;
        }
        return $array_response;
    }
}