<?php

namespace Portafolio\PageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Portafolio\PageBundle\DependencyInjection\Compiler\ValidatorRouting;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class PortafolioPageBundle extends Bundle
{
    /**
     * Esta función es usada para implementar el Validator Routing,
     * asignando asi la nueva ruta de la carpeta Validator.
     *
 	 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     */
	public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ValidatorRouting());
    }
}
