app.controller('DescontoListaCtrl', function ($scope, $http, $alert) {

    $scope.list = [];

    $scope.init = function () {
        $scope.listar();
    }

    $scope.remove = function(index, id) {
        var conf = confirm('Tem certeza que deseja excluir o registro?');

        if (conf) {
            $http.post(
                    Routing.generate('desconto_remove'), { id: id})
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

    $scope.getNome = function (values) {
        if (values.pessoa_fisica) {
            return values.pessoa_fisica.tipo_user.nome + " - " + values.pessoa_fisica.nome;
        }

        if (values.pessoa_juridica) {
            return values.pessoa_juridica.tipo_user.nome + " - " + values.pessoa_juridica.nome;
        }
    }

    $scope.listar = function () {
        $http.post(
            Routing.generate('desconto_listar'))
            .success(function (data) {
                if (data.success) {
                    $scope.list = data.data;
                    return;
                }

                $scope.list = [];
            });
    }

});