<?php

namespace Portafolio\PageBundle\Controller;


use Portafolio\PageBundle\Entity\users;
use Portafolio\PageBundle\UseCase\CreateUser\CreateUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function createUsersAction(Request $request)
    {
        $list = $this->container->get('repositories')->getRepository('users');

        $user = new users();

        $user->createUser(
            [
                "name" => "paquita2",
                "email" => "as123@123.com",
                "last_name" => "del barrio",
                "identity_card" => 123321321,
                "address" => "y vive cerca"
            ]);

        $list->saveObj($user);

        return 'ok';
    }

    public function indexAction()
    {
        $command = new CreateUserCommand();
        $response = $this->container->get('bus.request')->execute($command);

        return $this->render('PortafolioPageBundle:Default:index.html.twig',['data' => $response, 'otro' => 'blablabla']);
    }
}
