<?php

namespace Portafolio\PageBundle\Entity;
use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
/**
 * AuthAccessToken
 */
class AuthAccessToken extends BaseAccessToken
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
