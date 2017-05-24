<?php

namespace Portafolio\PageBundle\Entity;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;
/**
 * AuthClient
 */
class AuthClient extends BaseClient
{
    /**
     * @var integer
     */
    protected $id;
}
