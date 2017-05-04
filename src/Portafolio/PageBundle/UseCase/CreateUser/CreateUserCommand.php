<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 10:55 AM
 */

namespace Portafolio\PageBundle\UseCase\CreateUser;

use Portafolio\PageBundle\Command\Command;

class CreateUserCommand implements Command
{
    protected $name;

    public function __construct($data = null)
    {
        $this->name = $data['name'];
    }

    public function getRequest()
    {
        return [
            'name' => $this->name
        ];
    }
}