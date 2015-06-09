app.controller('FinanceiroCtrl', function ($scope, $http, $routeParams, $alert) {

    $scope.list = [];
    $scope.financeiro = {};
    $scope.cartao = {};
    $scope.templates = [
        { name: 'pagamento', title: "Pagamento online / TEF", url:  baseUrl + '/financeiro/pagamento' },
        { name: 'boleto', title: "Boleto", url:  baseUrl + '/financeiro/boleto' }
    ];

    $scope.init = function () {
        var id = $routeParams.id;
        if (id) {
            $scope.edit(id);
        }
    }

    $scope.edit = function (id) {
        $http.post(
                Routing.generate('financeiro_edit', { id: id }))
            .success(function (response) {
                if (response.success) {
                    $scope.list.push( response.data );
                    $scope.financeiro = response.data;
                    return;
                }
            });
    }

    $scope.descricaoTipo = function (tipo) {
        if (tipo == 'E') {
            return 'Evento';
        }

        if (tipo == 'A') {
            return 'Associação';
        }
    }

    $scope.gerarBoleto = function (id) {
        var conf = confirm('Gostaria de gerar boleto?');

        if (conf)
            window.open(baseUrl + "/financeiro/gerar/boleto/" + id, "_blank");
    }

    $scope.pagseguro = function (id) {
        var conf = confirm('Gostaria de iniciar pagamento?');

        if (conf)
            window.open(baseUrl + "/financeiro/gerar/pagseguro/" + id, "_self");
    }
});