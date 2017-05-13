<?php

namespace Portafolio\PageBundle\Controller;


use Portafolio\PageBundle\Entity\users;
use Portafolio\PageBundle\UseCase\CreateUser\CreateUserCommand;
use Portafolio\PageBundle\UseCase\GetUser\GetUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function createUsersAction(Request $request)
    {
        $command = new CreateUserCommand(['name' => 'isabel']);
        $response = $this->container->get('bus.request')->execute($command);

        return new JsonResponse($response->getData(), $response->getCode());
    }

    public function indexAction()
    {
        $command = new GetUserCommand(['name' => 'isabel']);
        $response = $this->container->get('bus.request')->execute($command);

        return $this->render('PortafolioPageBundle:Default:index.html.twig',['data' => $response->getData()['name'], 'otro' => 'blablabla']);
    }
}
