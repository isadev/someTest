<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/13/17
 * Time: 2:27 PM
 */

namespace Portafolio\PageBundle\UseCase\User\Get;

use Portafolio\PageBundle\Service\CommandBase;

class GetUserCommand extends CommandBase
{
	/**
	 * Nombre del usuario
	 * @var string
	 */
	public $name;
}