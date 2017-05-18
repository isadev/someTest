<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/17/17
 * Time: 9:26 PM
 */

namespace Portafolio\PageBundle\Resources\Factory;

/**
 * Clase encargada de crear y devolver el servicio solicitada
 *
 * Class ServiceFactory
 * @package Portafolio\PageBundle\Resources\Factory
 * @author Isabel Nieto <isabelcnd@gmail.com>
 * @version 2017/05/18
 */
class ServiceFactory implements IServiceFactory
{

    public function __construct($container)
    {
        $this->container = $container;
        $this->em = $container->get('doctrine')->getEntityManager();
    }

    public function get($att)
    {
        if (is_null($att))
            return;
        return $this->{$att};

    }

    public function set($att, $value)
    {
        if ((strcmp($att, 'container') == 0) OR (strcmp($att, 'em') == 0))
            return;
        if (!is_null($value))
            $this->{$att} = $value;
    }

    public function getAll()
    {
        $array_response = [];

        foreach ($this as $att => $value) {
            $array_response["$att"] = $value;
        }
        return $array_response;
    }
}