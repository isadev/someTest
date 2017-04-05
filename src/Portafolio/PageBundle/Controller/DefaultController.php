<?php

namespace Portafolio\PageBundle\Controller;

use Portafolio\PageBundle\PortafolioPageBundle;
use Pug\PugSymfonyBundle\PugSymfonyBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
//        return $this->render('PortafolioPageBundle:Default:index.html.pug');
        return $this->render('PortafolioPageBundle:Default:index.html.twig');
    }
}
