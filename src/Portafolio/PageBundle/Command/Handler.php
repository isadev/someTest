<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 11:46 AM
 */

namespace Portafolio\PageBundle\Command;

use Portafolio\PageBundle\Resources\Factory\RepositoryFactory;

interface Handler
{
    /**
     * Ejecuta las funciones solicitadas por el caso de uso
     *
     * @param IRepositoryFactory $repositoryFactory
     * @param Command $command
     * @return mixed
     * @author Isabel Nieto <isabelcnd@gmail.com>
     * @version 03/05/2017
     */
    public function execute(RepositoryFactory $repositoryFactory, Command $command);
}