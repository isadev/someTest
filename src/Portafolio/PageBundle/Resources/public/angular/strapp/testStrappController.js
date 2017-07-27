"use strict";

/**
 * Controlador encargado de recibir los datos de la vista, enviarlos
 * al servicio y devolverlos nuevamente
 *
 * @author Isabel Nieto <isabelcnd@gmail.com>
 * @version 2017/05/14
 */
app.controller('testStrappController', ['$scope', '$http', function($scope, $http) {

    /**
     * Crear usuario viajero
     */
    $scope.createStrappViajero = function() {

        var route_new = Routing.generate('create_viajero');
        var dataUser = {
            "nombre": $scope.newUser,
            "direccion": $scope.newAddress,
            "cedula": $scope.newIdNumber,
            "telefono": $scope.newPhoneNumber
        };

        var jsonData = JSON.stringify(dataUser);

        return $http({
            method: 'POST',
            url: route_new,
            data: jsonData,
            contentType: "application/json"
        })
        .then(
            function success(response) {
                $scope.response = response.data;
                $scope.newUser = "";
                $scope.newAddress = "";
                $scope.newIdNumber = "";
                $scope.newPhoneNumbe = "";
            },
            function error(error) {
                $scope.response = error;
            }
        );
    };

    /**
     * Crear Viaje
     */
    $scope.createStrappViaje = function() {

        var route_new = Routing.generate('create_viaje');
        var dataUser = {
            "destino" : $scope.newDestino,
            "origen" : $scope.newOrigen,
            "nombre_viaje" : $scope.newTicketNumber,
            "codigo" : $scope.newCodeNumber,
            "otros" : $scope.newOther,
            "fecha" : $scope.newDate,
            "numero_plaza" : $scope.newPlaza,
            "nombre" : $scope.agencyName,
            "cedula" : $scope.iDNumber,
        };

        var jsonData = JSON.stringify(dataUser);

        return $http({
            method: 'POST',
            url: route_new,
            data: jsonData,
            contentType: "application/json"
        })
            .then(
                function success(response) {
                    $scope.response = response.data;
                    $scope.newDestino = "";
                    $scope.newOrigen = "";
                    $scope.newTicketNumber = "";
                    $scope.newCodeNumber = "";
                    $scope.newOther = "";
                    $scope.newDate = "";
                    $scope.newPlaza = "";
                    $scope.agencyName = "";
                    $scope.iDNumber = "";
                },
                function error(error) {
                    $scope.response = error;
                }
            );
    };

    /**
     * Crear Agencia
     */
    $scope.createStrappAgencia = function() {

        var route_new = Routing.generate('create_agencia');
        var data = {
            "nombre" : $scope.newAgencia,
        };

        var jsonData = JSON.stringify(data);

        return $http({
            method: 'POST',
            url: route_new,
            data: jsonData,
            contentType: "application/json"
        })
            .then(
                function success(response) {
                    $scope.response = response.data;
                    $scope.newAgencia = "";
                },
                function error(error) {
                    $scope.response = error;
                }
            );
    };

    /**
     * Peticion a la renderizacion de la vista de agencia
     */
    $scope.viewStrappAgencia = function() {
        var route_new = Routing.generate('render_view_strapp_create_agencia');
        window.location.href = route_new;
    };

    /**
     * Peticion a la renderizacion de la vista de viajero
     */
    $scope.viewStrappViajero = function() {
        var route_new = Routing.generate('render_view_strapp_create_viajero');
        window.location.href = route_new;
    };

    /**
     * Peticion a la renderizacion de la vista de viaje
     */
    $scope.viewStrappViaje = function() {
        var route_new = Routing.generate('render_view_strapp_create_viaje');
        window.location.href = route_new;
    };

    /**
     * Peticion a la renderizacion de la vista del home
     */
    $scope.homeStrapp = function () {
        var route_new = Routing.generate('render_home_test_strap');
        window.location.href = route_new;
    };

    /**
     * Peticion a la renderizacion de la vista de la consulta consulta de viajeros
     */
    $scope.viewGetStrappViajero = function () {
        var route_new = Routing.generate('render_view_strapp_get_viajero');
        window.location.href = route_new;
    };

    $scope.getDataStrappViajero = function () {
        var route_new = Routing.generate('get_viajero', {'cedula':$scope.newIdNumber});

        return $http({
            method: 'GET',
            url: route_new,
            contentType: "application/json"
        })
            .then(
                function success(response) {
                    $scope.response = response.data;
                    $scope.newIdNumber = "";
                },
                function error(error) {
                    $scope.response = error;
                }
            );
    };

    /**
     * Peticion a la renderizacion de la vista de la consulta de agencias
     */
    $scope.viewGetStrappAgencia = function () {
        var route_new = Routing.generate('render_view_strapp_get_agencia');
        window.location.href = route_new;
    };

    $scope.getDataStrappAgencia = function () {
        var route_new = Routing.generate('get_agencia', {'agenciaNombre':$scope.newAgencia});

        return $http({
            method: 'GET',
            url: route_new,
            contentType: "application/json"
        })
            .then(
                function success(response) {
                    $scope.response = response.data;
                    $scope.newAgencia = "";
                },
                function error(error) {
                    $scope.response = error;
                }
            );
    };

    /**
     * Peticion a la renderizacion de la vista de la consulta de los viajes
     */
    $scope.viewGetStrappViajes = function () {
        var route_new = Routing.generate('render_view_strapp_get_viaje');
        window.location.href = route_new;
    };

    $scope.getDataStrappViajes = function () {
        var route_new = Routing.generate('get_viaje');
        var data;
        if (typeof $scope.newCode !== 'undefined') {
            data = {'codigo' : $scope.newCode};
        }
        else if (typeof $scope.newAgencyName !== 'undefined') {
            data = {'nombre_agencia' : $scope.newAgencyName};
        }
        else if (typeof $scope.newiDNumber !== 'undefined') {
            data = {'cedula' : $scope.newiDNumber};
        }
        else
            data = null;

        var jsonData = JSON.stringify(data);

        return $http({
            method: 'POST',
            url: route_new,
            data: jsonData,
            contentType: "application/json"
        })
            .then(
                function success(response) {
                    $scope.response = response.data;
                    $scope.newAgencyName = "";
                    $scope.newiDNumber = "";
                    $scope.newCode = "";

                },
                function error(error) {
                    $scope.response = error;
                }
            );
    };

    $scope.updateViewStrappViajero = function () {
        var route_new = Routing.generate('render_view_strapp_update_viajero', {'cedula' : $scope.iDNumber});
        window.location.href = route_new;
    };

    $scope.updateDataStrappViajero = function () {
        var route_new = Routing.generate('update_viajero');

        var dataUser = {
            "nombre": $scope.newUser,
            "direccion": $scope.newAddress,
            "cedula": $scope.newIdNumber,
            "telefono": $scope.newPhoneNumber,
            "cedula_search": cedula2
        };

        var jsonData = JSON.stringify(dataUser);

        return $http({
            method: 'POST',
            url: route_new,
            data: jsonData,
            contentType: "application/json"
        })
            .then(
                function success(response) {
                    $scope.response = response.data;
                    $scope.newAgencyName = "";
                    $scope.newiDNumber = "";
                    $scope.newCode = "";

                },
                function error(error) {
                    $scope.response = error;
                }
            );
    };

    $scope.updateViewStrappViaje = function () {
        var route_new = Routing.generate('render_view_strapp_update_viaje', {'codigo' : $scope.codigo});
        window.location.href = route_new;
    };

    $scope.updateDataStrappViaje = function () {
        var route_new = Routing.generate('update_viaje');

        var dataUser = {
            "destino" : $scope.newDestiny,
            "origen" : $scope.newOrigin,
            "nombre" : $scope.newName,
            "otros" : $scope.newOther,
            "cedula_viajero" : $scope.newViajero,
            "agencia_nombre" : $scope.newAgencia,
            "codigo" : $scope.newCodigo,
            "fecha" : $scope.newDate,
            "codigo_search": codigo2
        };

        var jsonData = JSON.stringify(dataUser);

        return $http({
            method: 'POST',
            url: route_new,
            data: jsonData,
            contentType: "application/json"
        })
            .then(
                function success(response) {
                    $scope.response = response.data;
                    $scope.newAgencyName = "";
                    $scope.newiDNumber = "";
                    $scope.newCode = "";

                },
                function error(error) {
                    $scope.response = error;
                }
            );
    };

}]);

