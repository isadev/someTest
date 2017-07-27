<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 5:06 PM
 */

namespace Portafolio\PageBundle\UseCase\strapp\CreateStrappViaje;


use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Entity\agencia;
use Portafolio\PageBundle\Entity\viajes;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class CreateStrappViajeHandler implements Handler
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
            $request = $command->getRequest();
            $returnObj = true;

            $repoViajes = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:viajes');
            $repoViajero = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:viajero');
            $repoAgencia = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:agencia');

            $agencias = $repoAgencia->getAgencia($request['nombre'], $returnObj);
            $viajeros = $repoViajero->getViajero($request['cedula'], $returnObj);

            $agencia = $agencias[0];
            $viajero = $viajeros[0];

            if (isset($agencia) AND isset($viajero)) {
                $viajes = new viajes();

                $viajes->assignDataViaje($viajero, $agencia, $request);

                $agencia->addViaje($viajes);
                $agencia->addViajero($viajero);

                $viajero->addViaje($viajes);
                if ( is_null($viajero->getAgencia()) )
                    $viajero->setAgencia($agencia);

                $repoViajes->persistObj($viajes);
                $repoViajero->persistObj($viajero);
                $repoAgencia->persistObj($agencia);

                $repoAgencia->flushObj();
                return new ResponseHandler(200, 'OK', "Ok", "add succeed");
            }
            return new ResponseHandler(400, 'Bad Request', "Bad Data", "error agencia or viajero no existe");
        }
        catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), 500);
        }
    }
}