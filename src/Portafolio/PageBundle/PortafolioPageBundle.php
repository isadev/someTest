<?php

namespace Portafolio\PageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PortafolioPageBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
