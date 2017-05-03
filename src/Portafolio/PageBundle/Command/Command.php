<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 10:58 AM
 */

namespace Portafolio\PageBundle\Command;


interface Command
{
    /**
     * Constructor de la clase
     *
     * Command constructor.
     * @param $data
     * @author Isabel Nieto <isabelcnd@gmail.com>
     */
    public function __construct($data);

    /**
     * Datos enviados desde el controller
     * @return mixed
     * @author Isabel Nieto <isabelcnd@gmail.com>
     */
    public function getRequest();
}