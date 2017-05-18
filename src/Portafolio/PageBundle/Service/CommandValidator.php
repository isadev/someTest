<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 18/05/17
 * Time: 02:36 PM
 */

namespace Portafolio\PageBundle\Service;


class CommandValidator
{
    private $command;
    private $rules;

    public function __construct($command, $rules)
    {
        $this->command = $command;
        $this->rules = $rules;
    }

//    $rules = [ {atributo => tipo}, ... ]
    public function validate()
    {
        $error = [];
        // Recorremos la lista de restricciones a cumplirse
        foreach ($this->rules as $att => $type) {
            // Si el atributo no existe en el command y no se quiere evaluar su tipo
            if ( !is_null($this->command->get($att)) )
                $commandValue = $this->command->get($att);
                if (gettype($commandValue) !== $type)
                    $error[] = "Type expected: " . $type . ", got instead: " . gettype($commandValue);
        }
        return $error;
    }
}