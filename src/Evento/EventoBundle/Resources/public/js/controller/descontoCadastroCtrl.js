app.controller('DescontoCadastroCtrl', function ($scope, $http, $location, $routeParams, $alert) {

    $scope.form = {};
    $scope.tabActive = true;
    $scope.listFisica = [];
    $scope.listJuridica = [];
    $scope.listEvento = [];

    $scope.init = function () {
        $scope.listarPessoaJuridica();
        $scope.listarPessoaFisica();
        $scope.listarEvento();

        var id = $routeParams.id;
        if (id) {
            $scope.edit(id);
        }
    }

    $scope.generateHash = function(s){
        var n;
        if (typeof(s) == 'number' && s === parseInt(s, 10)){
            s = Array(s + 1).join('x');
        }
        $scope.form.codigoDesconto = s.replace(/x/g, function(){
            var n = Math.round(Math.random() * 61) + 48;
            n = n > 57 ? (n + 7 > 90 ? n + 13 : n + 7) : n;
            return String.fromCharCode(n);
        });
    }


    $scope.listarEvento = function () {
        $http.post(
                Routing.generate('evento_listar'))
            .success(function (data) {
                if (data.success) {
                    $scope.listEvento = data.data;
                    return;
                }

                $scope.listEvento = [];
            });
    }

    $scope.listarPessoaFisica = function () {
        $http.post(
                Routing.generate('user_listar'))
            .success(function (data) {
                if (data.success) {
                    $scope.listFisica = data.data.items;
                    return;
                }

                $scope.listFisica = [];
            });
    }

    $scope.listarPessoaJuridica = function () {
        $http.post(
                Routing.generate('user_listar_juridico'))
            .success(function (data) {
                if (data.success) {
                    $scope.listJuridica = data.data.items;
                    return;
                }

                $scope.listJuridica = [];
            });
    }

    $scope.edit = function (id) {
        $http.post(
                Routing.generate('desconto_edit', { id: id }))
            .success(function (response) {
                if (response.success) {
                    var data = response.data;
                    var obj = {
                        id: data.id,
                        evento: data.evento.id,
                        pessoaFisica: (data.hasOwnProperty("pessoa_fisica"))? data.pessoa_fisica.id : null,
                        pessoaJuridica: (data.hasOwnProperty("pessoa_juridica"))? data.pessoa_juridica.id : null,
                        codigoDesconto: data.codigo_desconto,
                        descontoPorcentagem: data.desconto_porcentagem,
                        porcentagem: data.porcentagem,
                        valorDesconto: data.valor_desconto
                    };

                    $scope.tipoUser = (data.hasOwnProperty("pessoa_fisica"))? true : false;
                    $scope.form = obj;
                    return;
                }
            });
    }

    $scope.save = function () {
        var form = angular.copy($scope.form);

        $http.post(
            Routing.generate('desconto_save')
            , form)
            .success(function (response) {
                if (response.success) {
                    $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                    $location.path('/desconto');
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});

            });
    }
});