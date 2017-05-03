<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/2/17
 * Time: 8:49 PM
 */

namespace Portafolio\PageBundle\Repository;

/**
 * Clase base para el salvado de la informacion y otros metodos repetibles
 *
 * Class BaseRepository
 * @package Portafolio\PageBundle\Repository
 */
class BaseRepository extends \Doctrine\ORM\EntityRepository
{
    public function saveObj($objs)
    {
        if ( is_array($objs) ) {
            foreach ($objs as $obj)
                $this->getEntityManager()->persist($obj);
        }
        else {
            $this->getEntityManager()->persist($objs);
        }
        $this->getEntityManager()->flush();
    }

    public function persistObj($objs)
    {
        if ( is_array($objs) ) {
            foreach ($objs as $obj)
                $this->getEntityManager()->persist($obj);
        }
        else
            $this->getEntityManager()->persist($objs);
    }

    public function flushObj()
    {
        $this->getEntityManager()->flush();
    }
}