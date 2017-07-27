<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/26/17
 * Time: 11:33 PM
 */

namespace Portafolio\PageBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RenderStrappController extends Controller
{
    /**
     * Funcion para renderizar la vista a la home
     */
    public function renderHomeAction()
    {
        return $this->render("@PortafolioPage/strapp_test/home.html.twig");
    }

    /**
     * Funcion para renderizar la creacion de una nueva agencia
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderCreateAgenciaAction()
    {
        return $this->render("@PortafolioPage/strapp_test/createAgencia.html.twig");
    }

    /**
     * Funcion para renderizar la creacion de un nuevo viaje
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderCreateViajeAction()
    {
        return $this->render("@PortafolioPage/strapp_test/createViaje.html.twig");
    }

    /**
     * Funcion para renderizar la creacion de un nuevo usuario viajero
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderCreateViajeroAction()
    {
        return $this->render("@PortafolioPage/strapp_test/createViajero.html.twig");
    }

    /**
     * Funcion para renderizar la consulta a las Agencias
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderGetAgenciaAction()
    {
        return $this->render("@PortafolioPage/strapp_test/getAgencia.html.twig");
    }

    /**
     * Funcion para renderizar la consulta a los viajes
     *
     */
    public function renderGetViajeAction()
    {
        return $this->render("@PortafolioPage/strapp_test/getViaje.html.twig");
    }

    /**
     * Funcion para renderizar la consulta a los viajeros
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderGetViajeroAction()
    {
        return $this->render("@PortafolioPage/strapp_test/getViajero.html.twig");
    }

    /**
     * Funcion para renderizar la vista a los actualizacion de los datos del viajero
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderUpdateViajeroAction(Request $request, $cedula)
    {
        return $this->render("@PortafolioPage/strapp_test/updateViajero.html.twig", ['data' => $cedula]);
    }

    /**
     * Funcion para renderizar la vista a los actualizacion de los datos de un viaje
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderUpdateViajeAction(Request $request, $codigo)
    {
        return $this->render("@PortafolioPage/strapp_test/updateViaje.html.twig", ['data' => $codigo]);
    }
}