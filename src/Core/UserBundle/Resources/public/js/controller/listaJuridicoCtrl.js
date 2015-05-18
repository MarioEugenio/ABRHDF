app.controller('UserListaJuridicoCtrl', function ($scope, $http, $alert) {

    $scope.list = [];
    $scope.page = 1;

    $scope.init = function () {
        $scope.listar();
    };

    $scope.remove = function(index, id) {
        var conf = confirm('Tem certeza que deseja excluir o registro?');

        if (conf) {
            $http.post(
                    Routing.generate('user_remove'), { id: id})
                .success(function (response) {
                    if (response.success) {
                        $scope.list.items.splice(index, 1);
                        $scope.listar();
                        $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});

                        return;
                    }

                    $scope.list = [];
                });
        }
    };

    $scope.buscar = function () {
        $scope.page = 1;
        $scope.listar();
    };

    $scope.listar = function () {
        $http.post(
            Routing.generate('user_listar_juridico',{page:$scope.page, searchText:$scope.searchText}))
            .success(function (data) {
                if (data.success) {
                    $scope.list = data.data;
                    return;
                }

                $scope.list = [];
            });
    };

});