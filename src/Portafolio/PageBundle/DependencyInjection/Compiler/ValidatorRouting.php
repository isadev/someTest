<?php
//Uso de la clase compiler
namespace Portafolio\PageBundle\DependencyInjection\Compiler;

use Symfony\Component\Finder\Finder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\Config\Resource\DirectoryResource;

/**
 * Clase ValidatorRouting
 *
 * La clase es usada para definir la ruta de la carpeta de las validaciones
 * del validator de symfony.
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 */
class ValidatorRouting implements CompilerPassInterface
{
    /**
     * Definición de archivos de validaciones del sistema
     *
     * @param \ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $validatorBuilder = $container->getDefinition('validator.builder');
        $validatorFiles = array();
        $finder = new Finder();

        foreach ($finder->files()->in(__DIR__ . '/../../Validator') as $file) {
            $validatorFiles[] = $file->getRealPath();
        }

        $validatorBuilder->addMethodCall('addYamlMappings', array($validatorFiles));
        $container->addResource(new DirectoryResource(__DIR__ . '/../../Validator/'));
    }
}
