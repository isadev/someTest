<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/13/17
 * Time: 2:53 PM
 */

namespace Portafolio\PageBundle\UseCase\User\Get;

use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Resources\Factory\IRepositoryFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class GetHandler implements Handler
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
    public function execute(IRepositoryFactory $repositoryFactory, Command $command)
    {
        $request = $command->getRequest();

        $list = $repositoryFactory->getRepository('users');

        $count = count($list->findAll());
        $dataUser = $list->findBy(['name' => $request['name']]);
        $data['name'] = $dataUser[0]->getName();
        $data['countTotal'] = $count;

        return new ResponseHandler(200, 'OK', $data, "ok");
    }
}