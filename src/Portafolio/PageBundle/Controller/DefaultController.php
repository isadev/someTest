<?php

namespace Portafolio\PageBundle\Controller;


use Portafolio\PageBundle\Entity\users;
use Portafolio\PageBundle\UseCase\CreateUser\CreateUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $command = new CreateUserCommand(["name"=>"pruebas de comando"]);
        $response = $this->container->get('command_handler_connected')->execute($command);

return new JsonResponse($response, 200);
        $list = $this->container->get('list_repositories')->getRepository('users');

        $user = new users();

        $user->createUser(
            [
            "name" => "paquita",
            "email" => "as123@123.com",
            "last_name" => "del barrio",
            "identity_card" => 123321321,
            "address" => "y vive cerca"
            ]);

        $list->saveObj($user);
        return $this->render('PortafolioPageBundle:Default:index.html.twig',['data' => count($list->findAll()), 'otro' => 'blablabla']);
    }
}
