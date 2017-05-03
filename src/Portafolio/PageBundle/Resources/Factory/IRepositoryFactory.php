<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 5:47 PM
 */

namespace Portafolio\PageBundle\Resources\Factory;


interface IRepositoryFactory
{
    /**
     * IRepositoryFactory constructor.
     * @param $args
     */
    public function __construct($args);

    /**
     * Metodo para obtener los repositorios
     * @param $name
     * @return mixed
     */
    public function getRepository($name);
}