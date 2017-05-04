<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 12:02 PM
 */

namespace Portafolio\PageBundle\Service;

use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Resources\Factory\RepositoryFactory;

class CommandHandlerConnected
{
    private $container;
    private $rf;

    public function __construct($args,RepositoryFactory $rf)
    {
        $this->container = $args;
        $this->rf = $rf;
    }

    public function execute(Command $command)
    {
        // Separamos el namespace de donde viene la clase del command
        $commandNamespace = explode("\\", get_class($command));
        $lengthCommand = count($commandNamespace);

        $commandName = $commandNamespace[$lengthCommand - 1];
        $handlerName = preg_replace("/Command/", "Handler", $commandName);

        // Creamos la namespace para ubicar la ruta del handler
        $handlerClassName = "";
        for ($ii = 0; $ii < $lengthCommand - 1; $ii++)
            $handlerClassName = $handlerClassName . $commandNamespace[$ii] . "\\";
        $handlerClassName = $handlerClassName . $handlerName;

        // Si la clase existe procedemos con el resto del trabajo que ejecuta el handler
        try {
            if (class_exists($handlerClassName, true)) {
                $reflectedClass = new \ReflectionClass($handlerClassName);
                $handler = $reflectedClass->newInstance();
                return $handler->execute($this->rf, $command);
            }
        }
        catch (\Exception $e) {
            throw new \Exception($e->getFile(). "\\n".$e->getMessage(). "\\n". $e->getLine(), 500);
        }
    }
}