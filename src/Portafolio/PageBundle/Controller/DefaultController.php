<?php

namespace Portafolio\PageBundle\Controller;


use Portafolio\PageBundle\UseCase\User\Create\CreateCommand;
use Portafolio\PageBundle\UseCase\User\Get\GetCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Portafolio\PageBundle\Service\ApplyCommand;

class DefaultController extends Controller
{
    public function createUsersAction(Request $request)
    {
        $command = new CreateCommand(['name' => 'isabel2']);
        $response = $this->container->get('bus.request')->execute($command);

        return new JsonResponse($response->getStatus(), $response->getCode());
    }

    public function indexAction()
    {
        /*
        $command = new ApplyCommand("CreateUser");
        $response = $this->container->get('bus.request')->execute($command->setData(["name"=>123]));
        */
        
        $command = new GetCommand(['name' => 'isabel2']);
        $response = $this->container->get('bus.request')->execute($command);

        return $this->render('PortafolioPageBundle:Default:index.html.twig',['data' => $response->getData()['name'], 'otro' => 'blablabla']);
    }
}
