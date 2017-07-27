<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 11:36 PM
 */

namespace Portafolio\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Portafolio\PageBundle\Service\ApplyCommand;

class CreateStrappController extends Controller
{
    /**
     * Funcion para crear un usuario viajer
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createViajeroAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("CreateStrappViajeroCommand");

        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getData(), $response->getCode());
    }

    /**
     * Funcion para crear una agencia
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createAgenciaAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("CreateStrappAgenciaCommand");

        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getData(), $response->getCode());
    }

    /**
     * Funcion para asociar agencia a viajero
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createViajeAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("CreateStrappViajeCommand");

        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getData(), $response->getCode());
    }

    /**
     * Funcion para buscar un usuario viajer
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getViajeroAction(Request $request, $cedula)
    {
        $command = new ApplyCommand("GetStrappViajeroCommand");

        $response = $this->container->get('bus.request')->execute($command->setData(['cedula' => $cedula]));

        return new JsonResponse($response->getData(), $response->getCode());
    }

    /**
     * Funcion para buscar una agencia
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getAgenciaAction(Request $request, $agenciaNombre)
    {
        $command = new ApplyCommand("GetStrappAgenciaCommand");

        $response = $this->container->get('bus.request')->execute($command->setData(['nombre' => $agenciaNombre]));

        return new JsonResponse($response->getData(), $response->getCode());
    }

    /**
     * Funcion para obtener el boleto de un viajero
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getViajeAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("GetStrappViajeCommand");

        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getData(), $response->getCode());
    }
}