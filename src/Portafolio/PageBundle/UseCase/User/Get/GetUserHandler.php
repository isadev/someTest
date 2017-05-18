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
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class GetUserHandler implements Handler
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
        $code = 500;
        $status = "Bad Request";
        $message = null;
        try {
            $list = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:users');


            $count = count($list->findAll());
            $dataUser = $list->findBy(['name' => $request['name']]);
            $data['name'] = $dataUser[0]->getName();

            $data['total'] = $count;
            $code = 200;
            $status = "OK";
        }
        catch (\Exception $e) {
            $message =  "File: " . $e->getFile() .
                        " in line: " . $e->getLine() .
                        " whith message: " . $e->getMessage();
            $data['name'] = null;
            $data['countTotal'] = -1;
    }
        return new ResponseHandler($code, $status, $data, $message);
    }
}