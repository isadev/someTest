<?php

namespace Portafolio\PageBundle\Entity;

/**
 * users
 */
class users
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $address;

    /**
     * @var int
     */
    private $identityCard;

    /**
     * @var string
     */
    private $nacionality;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $active;

    /**
     * @var string
     */
    private $role;

    public function __construct()
    {
        $this->active = false;
        $this->role = "client";
        $this->nacionality = "V";
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return users
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return users
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return users
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set identityCard
     *
     * @param integer $identityCard
     *
     * @return users
     */
    public function setIdentityCard($identityCard)
    {
        $this->identityCard = $identityCard;

        return $this;
    }

    /**
     * Get identityCard
     *
     * @return int
     */
    public function getIdentityCard()
    {
        return $this->identityCard;
    }

    /**
     * Set nacionality
     *
     * @param string $nacionality
     *
     * @return users
     */
    public function setNacionality($nacionality)
    {
        $this->nacionality = $nacionality;

        return $this;
    }

    /**
     * Get nacionality
     *
     * @return string
     */
    public function getNacionality()
    {
        return $this->nacionality;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param string $active
     *
     * @return users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return users
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    public function createUser($array)
    {
        $this->name = $array['name'];
        $this->email= $array['email'];
        $this->lastName = $array['last_name'];
        $this->address = $array['address'];
        $this->identityCard = $array['identity_card'];
    }
}
