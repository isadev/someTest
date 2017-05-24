<?php

namespace Portafolio\PageBundle\Entity;
use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
/**
 * AuthRefreshToken
 */
class AuthRefreshToken extends BaseRefreshToken
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Portafolio\PageBundle\Entity\users
     */
    protected $user;

    /**
     * @var \Portafolio\PageBundle\Entity\authClient
     */
    protected $client;
}
