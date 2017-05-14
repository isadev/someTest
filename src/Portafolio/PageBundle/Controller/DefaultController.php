<?php

namespace Portafolio\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Portafolio\PageBundle\Service\ApplyCommand;

/**
 * Class DefaultController
 * @package Portafolio\PageBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * Funcion encargada de la renderizacion de la vista principal
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Isabel Nieto <isabelcnd@gmail.com>
     * @version 2017/05/14
     */
    public function indexAction() {
        return $this->render('PortafolioPageBundle:Default:index.html.twig');
    }

    /**
     * Funcion encargada de crear un usuario dado
     *
     * @param Request $request
     * @return JsonResponse
     * @author Isable Nieto <isabelcnd@gmail.com>
     * @version 2017/05/14
     */
    public function createUsersAction(Request $request) {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("User","Create");
        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getStatus(), $response->getCode());
    }

    /**
     * Funcion encargada de buscar un usuario
     *
     * @param Request $request
     * @return JsonResponse
     * @author Isabel Nieto <isabelcnd@gmail.com>
     * @version 2017/05/14
     */
    public function getUserAction(Request $request) {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("User","Get");
        $response = $this->container->get('bus.request')->execute($command->setData($data));

        if ($response->getCode() == 200)
            return new JsonResponse($response->getData(), $response->getCode());
        else
            return new JsonResponse($response->getMessage(), $response->getCode());
    }
}
