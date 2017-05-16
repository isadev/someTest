"use strict";

/**
 * Controlador encargado de recibir los datos de la vista, enviarlos
 * al servicio y devolverlos nuevamente
 *
 * @author Isabel Nieto <isabelcnd@gmail.com>
 * @version 2017/05/14
 */
app.controller('userController', ['$scope', '$http', 'userService', function($scope, $http, userService) {

    $scope.createUser = function() {

        var route_new = Routing.generate('create_user');
        var dataUser = { 'name': $scope.newUser};

        userService.createUser(route_new,dataUser,null)
        .then(
            function success(data) {
                dataUser = { 'name': $scope.newUser};

                route_new = Routing.generate('get_user');
                userService.getUser(route_new, dataUser, null)
                    .then(
                        function success(data) {
                            $scope.newUserAdded = data;
                        },
                        function error(error) {
                            console.log(error);
                        }
                    );
            },
            function error(error) {
                console.log(error);
            }
        );
    };

    $scope.redirectTo = function () {
        var route_new = Routing.generate('created_view_user');
        window.location.href = route_new;
    };

}]);
