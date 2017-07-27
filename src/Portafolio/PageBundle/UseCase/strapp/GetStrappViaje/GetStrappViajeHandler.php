<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 6:24 PM
 */

namespace Portafolio\PageBundle\UseCase\strapp\GetStrappViaje;


use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Entity\agencia;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class GetStrappViajeHandler implements Handler
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
        $getObj = true;
        $repoViaje = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:viajes');
        $repoAgencia = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:agencia');
        $repoViajero = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:viajero');

        if (isset($request['nombre_agencia']) OR isset($request['cedula']) OR isset($request['codigo'])) {
            if (isset($request['nombre_agencia'])) {
                $agencias = $repoAgencia->getAgencia($request['nombre_agencia'], $getObj);

                $agencia = $agencias[0];
                $response['nombre_agencia'] = $agencia->getNombre();
                $viajes = $agencia->getViajes();
                $array_viajes = [];
                foreach ($viajes as $viaje) {
                    $objViaje = $viaje->toArray();
                    array_push($array_viajes, $objViaje);
                    $objViaje = [];
                }
                $response['viajes'] = $array_viajes;
            } else if (isset($request['cedula'])) {
                $viajeros = $repoViajero->getViajero($request['cedula'], $getObj);

                $viajero = $viajeros[0];
                $response['nombre_agencia'] = $viajero->getAgencia()->getNombre();
                $viajes = $viajero->getViajes();
                $array_viajes = [];
                foreach ($viajes as $viaje) {
                    $objViaje = $viaje->toArray();
                    array_push($array_viajes, $objViaje);
                    $objViaje = [];
                }
                $response['viajes'] = $array_viajes;
            } else if (isset($request['codigo'])) {
                $viajes = $repoViaje->getViajes($request['codigo'], $getObj);
                $array_viajes = [];
                foreach ($viajes as $viaje) {
                    $objViaje = $viaje->toArray();
                    array_push($array_viajes, $objViaje);
                    $objViaje = [];
                }
                $response['viajes'] = $array_viajes;
                $viaje = $viajes[0];

                $response['nombre_agencia'] = $viaje->getAgencia()->getNombre();
            }
            return new ResponseHandler(200, 'Ok', $response);
        }
        else
            return new ResponseHandler(400, 'Bad', "Bad Request");
    }
}