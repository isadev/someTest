<?php

namespace Portafolio\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortafolioPageBundle:Default:index.html.pug');
    }
}
