<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 12:02 PM
 */

namespace Portafolio\PageBundle\Service;

use Portafolio\PageBundle\Command\Command;
use Portafolio\PageBundle\Command\Handler;
use Portafolio\PageBundle\Resources\Factory\RepositoryFactory;
use Portafolio\PageBundle\UseCase\CreateUser\CreateUserHandler;


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
        // Separamos el nombre de la clase del command
        $commandClassName = explode("\\", get_class($command));
        $lengthCommand = count($commandClassName);

        $name = $commandClassName[$lengthCommand - 1];
        $handlerName = preg_replace("/Command/", "Handler", $name);

        // Creamos la ruta para el nombre del handler
        $handlerClassName = "";
        for ($ii = 0; $ii < $lengthCommand - 1; $ii++)
            $handlerClassName = $handlerClassName . $commandClassName[$ii] . "\\";
        $handlerClassName = $handlerClassName . $handlerName;

//        $a = new CreateUserHandler();
//        return $a->execute($this->rf, $command);

//        $a = $this->container->getParameterBag();

//        require_once($handlerClassName.'.php');
        if(class_exists($handlerClassName, true)) {
            $a = new $handlerName;
            return $a->execute($this->rf, $command);
        }

        return [
            class_exists(get_class($command)),
            class_exists($handlerClassName),

//            "command" => $name, "handler" => $handlerName, "container" => get_class_methods($this->container)
];
    }
}