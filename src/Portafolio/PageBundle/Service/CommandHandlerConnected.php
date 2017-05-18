<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 12:02 PM
 */

namespace Portafolio\PageBundle\Service;

use Portafolio\PageBundle\Command\Command;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * Class CommandHandlerConnected
 * @package Portafolio\PageBundle\Service
 */
class CommandHandlerConnected
{
    private $container;
    private $serviceF;

    public function __construct($container, $serviceFactory)
    {
        $this->container = $container;
        $this->serviceF = $serviceFactory;
    }

    /**
     * Metodo encargado de tomar el command y enviarle la informacion al handler
     * para su posterior manipulacion
     *
     * @param Command $command
     * @return mixed
     * @throws \Exception
     * @author Isabel Nieto
     * @version 04/05/2017
     */
    public function execute(Command $command)
    {
        // Separamos el namespace de donde viene la clase del command
        $commandNamespace = explode("\\", get_class($command));

        // Sustituimos el Command del caso de uso por Handler
        $handlerName = preg_replace("/Command/", "Handler", $commandNamespace);

        // Creamos la namespace para ubicar la ruta del handler
        $handlerClassName = implode('\\',$handlerName);

        try {
            $finder = new Finder();

            // Nos ubicamos donde se encuentran los validadores de los caso de uso
            $dir = __DIR__.'/../Validate/';

            foreach ($finder->files()->in($dir) as $file) {

                $content = Yaml::parse(file_get_contents(__DIR__ . '/../Validate/' . $file->getFilename()));

                $commandName = 'CreateUserCommand';
                $commandFileName = preg_replace('/.yml/','',$content[$commandName]);

                dump($content);
                var_dump([$content[0]/*, $commandFileName*/]);
            }
        } catch (ParseException $e) {
            dump("Unable to parse the YAML string: ".$e->getMessage());
        }

        // Si la clase existe procedemos con el resto del trabajo que ejecuta el handler
        try {
            if (class_exists($handlerClassName, true)) {
                $reflectedClass = new \ReflectionClass($handlerClassName);
                $handler = $reflectedClass->newInstance();
                return $handler->execute($this->serviceF, $command);
            }
        }
        catch (\Exception $e) {
            throw new \Exception($e->getFile(). " with message: ".$e->getMessage(). " in line: ". $e->getLine(), 500);
        }
    }
}