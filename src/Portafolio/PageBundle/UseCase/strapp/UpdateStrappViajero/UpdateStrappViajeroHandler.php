<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 11:56 PM
 */

namespace Portafolio\PageBundle\UseCase\strapp\UpdateStrappViajero;


use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class UpdateStrappViajeroHandler implements Handler
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

        $sql = $repoViajero->updateDataViajero($request);

        if ($sql == 1) {
            return new ResponseHandler(200, 'OK', $sql);
        }
        return new ResponseHandler(400, 'Bad', "Bad Data");
    }
}