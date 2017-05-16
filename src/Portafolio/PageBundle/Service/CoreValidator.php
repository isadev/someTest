<?php
/**
 * Created by PhpStorm.
 * User: Joel
 * Date: 15/5/17
 * Time: 12:02 PM
 */
namespace Portafolio\PageBundle\Service;

/**
 * CoreValidator
 * 
 * La siguiente clase uso de validadores de clases
 * que se implementan en Symfony
 *
 * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
 */
class CoreValidator
{
    /**
     * Contenedor de Symfony
     * 
     * @var ContainerInterface
     */
    private $container;

    /**
     * Constructor de la clase
     * 
     * @param array $data
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Método que permite validar un objeto
     * 
     * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
     *
     * @param  string $obj     objecto a validar
     * @param  string $critery criterio de validación
     * @return Array
     */
    public function getValidator($obj, $critery = null)
    {
        $error = $this->container->get('validator')->validate($obj, $critery);

        if (count($error) > 0) {
            
            $response = []; 
            foreach ($error as $currentError) {
                $response[] = [
                    'message' => $currentError->getMessage(),
                    'value' => $currentError->getInvalidValue(),
                    'parameter' => $currentError->getPropertyPath()
                ];
            }            

            return $response;
        }

        return null;
    }
}