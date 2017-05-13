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
    private $attributes;

    /**
     * Constructor de la clase
     *
     * Command constructor.
     * @param $data
     * @author Isabel Nieto <isabelcnd@gmail.com>
     */
    public function __construct($data)
    {
        $this->attributes = $data;
    }

    /**
     * Datos enviados desde el controller
     * @return mixed
     * @author Isabel Nieto <isabelcnd@gmail.com>
     */
    public function getRequest()
    {
        $array_response = [];

        foreach ($this->attributes as $key => $value) {
                $array_response["$key"] = $value;
        }
        return $array_response;
    }
}