app.controller('EventoListaCtrl', function ($scope, $http, $alert) {

    $scope.list = [];

    $scope.init = function () {
        $scope.listar();
    }

    $scope.remove = function(index, id) {
        var conf = confirm('Tem certeza que deseja excluir o registro?');

        if (conf) {
            $http.post(
                    Routing.generate('evento_remover'), { id: id})
                .success(function (response) {
                    if (response.success) {
                        $scope.list.splice(index, 1);
                        $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});

                        return;
                    }

                    $scope.list = [];
                });
        }
    }

    $scope.listar = function () {
        $http.post(
            Routing.generate('evento_listar'))
            .success(function (data) {
                if (data.success) {
                    $scope.list = data.data;
                    return;
                }

                $scope.list = [];
            });
    }

});