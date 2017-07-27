<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 11:54 PM
 */

namespace Portafolio\PageBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Portafolio\PageBundle\Service\ApplyCommand;

class UpdateStrappController extends Controller
{
    /**
     * Funcion para actualizar un usuario viajero
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateViajeroAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("UpdateStrappViajeroCommand");

        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getData(), $response->getCode());
    }

    /**
     * Funcion para actualizar un viaje
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateViajeAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("UpdateStrappViajeCommand");

        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getData(), $response->getCode());

    }
}