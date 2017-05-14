<?php

namespace Portafolio\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Portafolio\PageBundle\Service\ApplyCommand;

class DefaultController extends Controller
{
    public function createUsersAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new ApplyCommand("User","Create");
        $response = $this->container->get('bus.request')->execute($command->setData($data));

        return new JsonResponse($response->getStatus(), $response->getCode());
    }

    public function indexAction()
    {
        $command = new ApplyCommand("User","Get");
        $response = $this->container->get('bus.request')->execute($command->setData(["name"=>"isabel"]));

        return $this->render('PortafolioPageBundle:Default:index.html.twig',['data' => $response->getData()['name'], 'otro' => 'blablabla']);
    }
}
