<?php

namespace Portafolio\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
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
        return $this->render('PortafolioPageBundle:User:index.html.twig');
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

        $command = new ApplyCommand("CreateUserCommand");
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

        $command = new ApplyCommand("GetUserCommand");

        $response = $this->container->get('bus.request')->execute($command->setData($data));

        if ($response->getCode() == 200)
            return new JsonResponse($response->getData(), $response->getCode());
        else
            return new JsonResponse($response->getMessage(), $response->getCode());
    }

    public function newUserCreatedViewAction() {
//        return $this->redirect($this->generateUrl('created_view_user'));
        return $this->render('PortafolioPageBundle:User:createdView.html.twig');
    }

    public function createUserAuthAction(Request $request)
    {
        /*$container = $this->container;
        $oauthServer = $container->get('fos_oauth_server.server');

        $redirectUri = "http://www.web_page.dev/app_dev.php/createdViewUser";
        $grantType = "authorization_code";

        $clientManager = $container->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setRedirectUris([$redirectUri]);
        $client->setAllowedGrantTypes([$grantType]);
        $clientManager->updateClient($client);


            dump(["publicId" => $client->getPublicId(),
            "secret" => $client->getSecret()]);
        $customers = $container->get('doctrine')->getRepository('PortafolioPageBundle:User')->findAll();

        foreach ($customers as $customer) {
            $queryData = [];
            $queryData['client_id'] = $client->getPublicId();
            $queryData['redirect_uri'] = $client->getRedirectUris()[0];
            $queryData['response_type'] = 'code';
            $authRequest = new Request($queryData);
            dump([$customer, $authRequest, $grantType,$oauthServer]);
            return $authRequest;
            $oauthServer->finishClientAuthorization(true, $customer, $authRequest, $grantType);

            dump(["customer" => $customer->getId()]);
        }

        return 1;*/
        $clientManager = $this->container->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
//        $client->setRedirectUris(array('http://www.web_page.dev/app_dev.php/createdViewUser'));
        $client->setAllowedGrantTypes(['client_credentials']/*array('token', 'authorization_code')*/);
        $clientManager->updateClient($client);

        dump(["secretId" => $client->getSecret(),"public_id" => $client->getPublicId(), "client" => $client]);
return 1;
        return $this->redirect($this->generateUrl('fos_oauth_server_authorize', array(
            'client_id'     => $client->getPublicId(),
            'redirect_uri'  => 'http://www.web_page.dev/app_dev.php/createdViewUser',
            'response_type' => 'code'
        )));

    }
}
