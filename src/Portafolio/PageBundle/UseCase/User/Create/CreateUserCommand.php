<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/3/17
 * Time: 10:55 AM
 */

namespace Portafolio\PageBundle\UseCase\User\Create;

use Portafolio\PageBundle\Service\CommandBase;

class CreateUserCommand extends CommandBase
{
	/**
	 * Nombre del usuario
	 * @var string
	 */
	public $name;

	/**
	 * Apellido del usuario
	 * @var string
	 */
	public $last_name;

	/**
	 * Email del usuario
	 * @var string
	 */
	public $email;

	/**
	 * Cedula del usuario
	 * @var string
	 */
	public $identity_card;

	/**
	 * Dirección del usuario
	 * @var string
	 */
	public $address;
}