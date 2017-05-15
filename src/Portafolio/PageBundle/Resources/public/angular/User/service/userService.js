'use strict';

/**
 * Servicio encargado de realizar la comunicacion con BackEnd,
 * procesar los datos y devolverlos estructurados al controller
 *
 * @author Isabel Nieto <isabelcnd@gmail.com>
 * @version 2017/05/14
 */
app.service('userService', ['$http', function ($http) {

    this.createUser = function (route_, data_, some_other_params_) {
        var jsonData = angular.toJson(data_);

        return $http({
            method: 'POST',
            url: route_,
            data: jsonData
        })
            .then(
                function success(response) {
                    return processSuccessResponse(response);
                },
                function error(error) {
                    return error;
                }
            );
    };

    function processSuccessResponse(response) {
        var someDataAddittional = {};
        someDataAddittional.code = response.data;

        return someDataAddittional;
    }

    this.getUser = function (route_, data_, some_other_params_) {
        var jsonData = angular.toJson(data_);

        return $http({
            method: 'POST',
            url: route_,
            data: jsonData
        })
            .then(
                function success(response) {
                    return response.data;
                },
                function error(error) {
                    return error;
                }
            );
    };
}]);
