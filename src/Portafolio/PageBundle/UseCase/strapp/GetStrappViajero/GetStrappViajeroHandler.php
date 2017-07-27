<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 4:44 PM
 */

namespace Portafolio\PageBundle\UseCase\strapp\GetStrappViajero;


use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class GetStrappViajeroHandler implements Handler
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
        $repoViajero = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:viajero');

        $viajero = $repoViajero->getViajero($request['cedula']);

        return new ResponseHandler(200, 'OK', $viajero);
    }
}