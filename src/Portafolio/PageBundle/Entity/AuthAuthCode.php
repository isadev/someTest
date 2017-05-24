<?php

namespace Portafolio\PageBundle\Entity;
use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
/**
 * AuthAuthCode
 */
class AuthAuthCode extends BaseAuthCode
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
