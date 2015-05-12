app.controller('LoginCtrl', function ($scope, $http, $alert) {

    $scope.form = {};

    $scope.init = function () {

    }

    $scope.autenticar = function () {
        var form = angular.copy($scope.form);

        $http.post(
            Routing.generate('user_auth'), form)
            .success(function (response) {
                if (response.success) {
                    window.location = baseUrl + '/colih/admin';
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});
            });
    }
});