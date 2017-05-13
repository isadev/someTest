<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/13/17
 * Time: 2:07 PM
 */

namespace Portafolio\PageBundle\Service;

/**
 * Clase encargada de devolver la respuesta al controller con los datos solicitados
 *
 * Class ResponseHandler
 * @author Isabel Nieto <isabelcnd@gmail.com>
 * @version 13/05/2017
 * @package Portafolio\PageBundle\Service
 */
class ResponseHandler
{
    private $code;
    private $status;
    private $data;
    private $message;

    /**
     * ResponseHandler constructor.
     * @param $code
     * @param $status
     * @param $data
     * @param $message
     */
    public function __construct($code = 200, $status = 'OK', $data = null, $message = null)
    {
        $this->code = $code;
        $this->status = $status;
        $this->data = $data;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


}