app.controller('EventoCadastroCtrl', function ($scope, $http, $location, $routeParams, $alert) {

    $scope.form = {};
    $scope.tabActive = true;
    $scope.publicar = false;

    $scope.init = function () {
        var id = $routeParams.id;
        if (id) {
            $scope.edit(id);
        }
    }

    $scope.edit = function (id) {
        $http.post(
                Routing.generate('evento_edit', { id: id }))
            .success(function (response) {
                if (response.success) {
                    $scope.form = response.data;
                    return;
                }
            });
    }

    $scope.save = function () {
        var form = angular.copy($scope.form);

        $http.post(
            Routing.generate('evento_save')
            , form)
            .success(function (response) {
                if (response.success) {
                    $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                    $location.path('/evento');
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});

            });
    }
});