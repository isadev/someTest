<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/17/17
 * Time: 9:27 PM
 */

namespace Portafolio\PageBundle\Resources\Factory;

/**
 * Interface IServiceFactory
 * @package Portafolio\PageBundle\Resources\Factory
 */
interface IServiceFactory
{
    public function __construct($data);

    public function get($att);

    public function set($att, $value);

    public function getAll();
}