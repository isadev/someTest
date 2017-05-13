<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 12:02 PM
 */
namespace Portafolio\PageBundle\Service;

use Symfony\Component\Finder\Finder;

/**
 * Clase para el manejo de los comando dentro de la carpeta UseCase.
 * 
 * Isa Te Sigo Quiero
 *
 * Class ApplyCommand

 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 * @package Portafolio\PageBundle\Service
 */
class ApplyCommand
{
    
    /**
     * Esta propiedad es usada para el manejo del Objeto Command
     *
     * @var Object
     */
	public $command;

    /**
     * Construct
     */ 
	public function __construct($name = null)
    {
    	$this->command = $this->commandSearch($name);
    }

    /**
     * Esta función es usada para devolver un listado de commandos
     * ubicado en la carpeta UseCase del proyecto.
     * 
     * @return Array
     */ 
    public function getListCommand()
    {
        // Explorador de archivos de symfony.
    	$finder = new Finder();

        $dir = '../src/Portafolio/PageBundle/UseCase';
        
        //Explorando la carpeta en busca de sus archivos.
		foreach ($finder->files()->in($dir) as $file) {
            // Tomando en cuenta solo archivos de tipo Command
			if (strpos(basename($file->getRealPath()), "Command.php")) {
                // Optimización y refactorizacion del Path de los comandos encontrados
            	$path = str_replace("../src/","",$file->getPath());
            	$path = str_replace("/","\\",$path);
            	$baseName = str_replace(".php","",$file->getBaseName());

                //Contruyendo un arreglo de tipo clave->valor
                // ["CommandName"=>"CommandPath"]
            	$listCommand[$file->getRelativePath()] = $path."\\".$baseName;
			}
        }
        
        return $listCommand;
    }

    /**
     * Esta función es usada para buscar dentro de un listado de commando 
     * el comando solicitado.
     * 
     * @return Object
     */ 
    public function commandSearch($name)
    {
    	$listCommand = $this->getListCommand();

    	if (array_key_exists($name, $listCommand))
    		return new \ReflectionClass($listCommand[$name]);

    	return null;	
    }

    /**
     * Esta función es usada para incluir dentro del Comando
     * sus parametros .
     * 
     * @return Object
     */ 
    public function setData($data = null)
    {
        return $this->command->newInstance($data);
    }
}