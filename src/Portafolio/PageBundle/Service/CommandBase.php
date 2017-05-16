<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/13/17
 * Time: 2:29 PM
 */

namespace Portafolio\PageBundle\Service;

use Portafolio\PageBundle\Command\Command;

/**
 * Clase encargada de incluir los atributos y valores para la manipulacion en el handler
 *
 * Class CommandBase
 * @package Portafolio\PageBundle\Service
 */
class CommandBase implements Command
{
   /**
    * Constructor de la clase
    * 
    * @param array $data
    */
   public function __construct($data = null)
   {
       if (!empty($data) && is_array($data)) {
           $this->setAtrributes($data);
       }
   }

   /**
    * La función retorna el valor de un atributo del Command
    * 
    * @param  string $att atributo a buscar
    * @return mixed valor del atributo
    */
   public function get($att)
   {
       return ( isset($this->$att) ? $this->$att : null );
   }

   /**
    * La función actualiza un valor de caso de uso
    * 
    * @param string $att atributo a actualizar
    * @param [type] $val valor a actualizar
    */
   public function set($att,$val)
   {
       $this->$att = $val;
   }

   public function setAtrributes($data)
   {
       if (is_array($data)) {
           foreach($data as $att => $val) {
               $this->set($att,$val);
           }
           return true;
       }
       return false;
   }
   
   /**
    * La función retorna un arreglo con todos los valores
    * del command
    * 
    * @return array arreglo con todos los valores del array
    */
   public function getRequest()
   {
       $response = [];
       foreach($this as $att => $val)
       {
           $response[$att] = $val;
       }
       return $response;
   }
}