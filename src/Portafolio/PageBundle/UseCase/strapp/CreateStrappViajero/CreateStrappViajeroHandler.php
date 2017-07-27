<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 2:26 PM
 */

namespace Portafolio\PageBundle\UseCase\strapp\CreateStrappViajero;


use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Entity\viajero;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class CreateStrappViajeroHandler implements Handler
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
        try {
            $viajero = new viajero();

            $request = $command->getRequest();
            $repoViajero = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:viajero');

            $countViajeros = count($repoViajero->findOneBy(["cedula" => $request['cedula']]));

            if ($countViajeros == 0) {
                $viajero->assignDataViajero($request);
                $repoViajero->saveObj($viajero);
            }

            return new ResponseHandler(200, 'OK', "OK", "add succeed");
        }
        catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), 500);
        }
    }
}