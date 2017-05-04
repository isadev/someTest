<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/2/17
 * Time: 9:48 PM
 */

namespace Portafolio\PageBundle\Resources\Factory;


class RepositoryFactory implements IRepositoryFactory
{
    private $entityManager;

    public function __construct($doctrine)
    {
        $this->entityManager = $doctrine->getManager();
    }

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