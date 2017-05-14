<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/2/17
 * Time: 9:48 PM
 */

namespace Portafolio\PageBundle\Resources\Factory;

/**
 * Clase encargada de buscar y devolver el repositorio de
 * la entidad solicitada
 *
 * Class RepositoryFactory
 * @package Portafolio\PageBundle\Resources\Factory
 * @author Isabel Nieto <isabelcnd@gmail.com>
 * @version 2017/05/14
 */
class RepositoryFactory implements IRepositoryFactory
{
    private $entityManager;

    public function __construct($doctrine)
    {
        $this->entityManager = $doctrine->getManager();
    }

    /**
     * Metodo para obtener los repositorios
     * @param $name
     * @return mixed
     */
    public function getRepository($name)
    {
        $position = null;
        $repositories = [
            [
                'repositoryLocation' => 'PortafolioPageBundle:users',
                'repositoryName' => 'users',
            ],
            [
                'repositoryLocation' => 'PortafolioPageBundle:nombre_otra_entidad',
                'repositoryName' => 'nombre_otra_entidad',
            ],
        ];

        $position = array_search($name,array_column($repositories,'repositoryName'));

        if (is_null($position))
            return null;
        return $this->entityManager->getRepository($repositories[$position]['repositoryLocation']);
    }
}