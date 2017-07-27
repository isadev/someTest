<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 4:41 PM
 */

namespace Portafolio\PageBundle\UseCase\strapp\CreateStrappAgencia;


use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Entity\agencia;
use Portafolio\PageBundle\Resources\Factory\IServiceFactory;
use Portafolio\PageBundle\Service\ResponseHandler;

class CreateStrappAgenciaHandler implements Handler
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
            $agencia = new agencia();

            $request = $command->getRequest();
            $repoAgencia = $serviceFactory->get('em')->getRepository('PortafolioPageBundle:agencia');

            $existAgencia = $repoAgencia->findOneBy(['nombre' => $request]);

            if (count($existAgencia) == 0) {
                $agencia->assignDataAgencia($request);
                $repoAgencia->saveObj($agencia);
            }

            return new ResponseHandler(200, 'OK', "OK", "add succeed");
        }
        catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), 500);
        }
    }
}