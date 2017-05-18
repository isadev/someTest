<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 11:45 AM
 */

namespace Portafolio\PageBundle\UseCase\User\Create;

use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Entity\users;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class CreateUserHandler implements Handler
{
    /**
     * Ejecuta las funciones solicitadas por el caso de uso
     *
     * @param IServiceFactory $serviceFactory
     * @param Command $command
     * @return mixed
     * @author Isabel Nieto <isabelcnd@gmail.com>
     * @version 03/05/2017
     */
    public function execute(IServiceFactory $serviceFactory, Command $command)
    {
        $request = $command->getRequest();

        $list = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:users');

        $user = new users($request);

        $list->saveObj($user);

        return new ResponseHandler(200, 'OK');
    }
}