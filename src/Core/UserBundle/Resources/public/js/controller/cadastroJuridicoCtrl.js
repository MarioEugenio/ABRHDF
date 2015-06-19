app.controller('UserCadastroJuridicoCtrl', function ($scope, $http, $location, $routeParams, $alert) {

    $scope.form = {
        flAssociado:false
    };

    $scope.editar = false;

    $scope.contato = {};
    $scope.complemento = {};
    $scope.empresa = {};

    $scope.estados = [];
    $scope.cidades = [];

    $scope.listValores = [
        { id: 1, texto: 'Até 05 funcionários', valor: '520.00' },
        { id: 2, texto: 'De 6 a 10 Funcionários', valor: '1020.00' },
        { id: 3, texto: 'De 11 a 100 funcionários', valor: '1430.00' },
        { id: 4, texto: 'De 101 a 200 funcionários', valor: '2000.00' },
        { id: 5, texto: 'Acima de  200 Funcionários', valor: '2560.00' }
    ];

    $scope.getEstados = function () {
        $http.post(
            Routing.generate('get_estado'))
            .success(function (response) {
                if (response.success) {
                    $scope.estados = response.data;
                }
            });
    };

    $scope.getEstados();

    $scope.getCidade = function () {
        $http.post(
            Routing.generate('get_cidade',{id: $scope.contato.estado}))
            .success(function (response) {
                if (response.success) {
                    $scope.cidades = response.data;
                }
            });
    };

    $scope.init = function () {
        var id = $routeParams.id;
        if (id) {
            $scope.edit(id);
        }
    };

    $scope.inscricao = function (valor, id) {
        var conf = confirm('Tem certeza que deseja associar este usuário?');

        if (conf) {
            $http.post(
                Routing.generate('financeiro_save'),
                { valor: valor, usuario: id, tipoPagamento: 'A' })
                .success(function (response) {
                    if (response.success) {
                        $location.path('/financeiro/' + response.data.id);
                        return;
                    }
                }
            );
        }
    }

    $scope.checkAssociacao = function () {
        if (($scope.editar)) {
            return true;
        }

        return false;
    }

    $scope.edit = function (id) {
        $http.post(
                Routing.generate('user_edit', { id: id }))
            .success(function (response) {
                if (response.success) {
                    $scope.editar = true;
                    $scope.form = response.data.form;
                    $scope.contato = response.data.contato;
                    $scope.complemento = response.data.complemento;
                    $scope.empresa = response.data.empresa;
                    $scope.rsenha = response.data.form.senha;
                    $scope.getCidade();
                    return;
                }
            });
    };

    $scope.save = function () {
        var form = angular.copy($scope.form);
        var contato = angular.copy($scope.contato);
        var complemento = angular.copy($scope.complemento);
        var empresa = angular.copy($scope.empresa);
        if ($scope.formCad.$valid) {
            $http.post(
                Routing.generate('user_save_juridico')
                , {form: form, contato: contato, complemento: complemento, empresa: empresa})
                .success(function (response) {
                    if (response.success) {
                        $alert({
                            title: 'MENSAGEM: ',
                            content: response.message,
                            container: '#alerts-container',
                            placement: 'top-right',
                            duration: 4,
                            type: 'success',
                            show: true
                        });

                        if ($routeParams.home)
                        {
                            $location.path('/');
                        } else {
                            if ($scope.form.flAssociado) {
                                $location.path('/user/' + response.data.id + '/representantes');
                            } else {
                                $location.path('/user/juridico');
                            }
                        }
                        return;
                    }

                    $alert({
                        title: 'MENSAGEM: ',
                        content: response.message,
                        container: '#alerts-container',
                        placement: 'top-right',
                        duration: 4,
                        type: 'info',
                        show: true
                    });

                });
        } else {
            $('html, body').animate({scrollTop:0}, 'slow');
            $alert({
                title: 'MENSAGEM: ',
                content: 'CNPJ Invalido',
                container: '#alerts-container',
                placement: 'top-right',
                duration: 4,
                type: 'info',
                show: true
            });
        }
    };
});