<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 11:45 AM
 */

namespace Portafolio\PageBundle\UseCase\CreateUser;

use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Resources\Factory\RepositoryFactory;
use Portafolio\PageBundle\Command\Handler;

class CreateUserHandler implements Handler
{
    /**
     * Ejecuta las funciones solicitadas por el caso de uso
     *
     * @param RepositoryFactory $repositoryFactory
     * @param Command $command
     * @return mixed
     * @author Isabel Nieto <isabelcnd@gmail.com>
     * @version 03/05/2017
     */
    public function execute(RepositoryFactory $repositoryFactory, Command $command)
    {
        return $command->getRequest();
//        $list = $repositoryFactory->getRepository('users');
//        return count($list->findAll());
    }
}