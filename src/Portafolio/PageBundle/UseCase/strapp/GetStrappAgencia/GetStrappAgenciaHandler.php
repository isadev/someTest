<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 4:44 PM
 */

namespace Portafolio\PageBundle\UseCase\strapp\GetStrappAgencia;


use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class GetStrappAgenciaHandler implements Handler
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
        $repoAgencia = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:agencia');

        $agencia = $repoAgencia->getAgencia($request['nombre']);

        return new ResponseHandler(200, 'OK', $agencia);
    }
}