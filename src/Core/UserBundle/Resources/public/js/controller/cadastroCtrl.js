app.controller('UserCadastroCtrl', function ($scope, $http, $location, $routeParams, $alert, $modal) {

    $scope.template = baseUrl + "/financeiro";
    $scope.editar = false;

    $scope.listValores = [
        { id: 1, texto: 'Anuidade contempla o recebimento mensal da Revista Melhor', valor: '200.00' },
        { id: 2, texto: 'Anuidade não contempla o recebimento mensal da Revista Melhor', valor: '160.00' }
    ];

    $scope.form = {
        flAssociado:false
    };
    $scope.contato = {};
    $scope.complemento = {};

    $scope.dateOptions = {
        changeYear: true,
        changeMonth: true
    };

    $scope.estados = [];
    $scope.cidades = [];

    $scope.associar = function () {


    }

    $scope.checkAssociacao = function () {
        if ($scope.editar) {
            return true;
        }

        return false;
    }

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

    $scope.init = function () {
        var id = $routeParams.id;
        if (id) {
            $scope.edit(id);
        }
    };

    $scope.edit = function (id) {
        $http.post(
            Routing.generate('user_edit', { id: id }))
            .success(function (response) {
                if (response.success) {
                    $scope.editar = true;
                    $scope.form = response.data.form;
                    $scope.contato = response.data.contato;
                    $scope.complemento = response.data.complemento;
                    $scope.rsenha = response.data.form.senha;
                    $scope.form.dtNascimento = new Date(response.data.form.dtNascimento);
                    $scope.getCidade();
                    return;
                }
            });
    };

    $scope.save = function () {
        var form = angular.copy($scope.form);
        var contato = angular.copy($scope.contato);
        var complemento = angular.copy($scope.complemento);
        if ($scope.formCad.$valid) {
            $http.post(
                Routing.generate('user_save')
                , {form: form, contato: contato, complemento: complemento})
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
                                $location.path('/user/' + response.data.id + '/dependentes');
                            } else {
                                $location.path('/user');
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
                content: 'CPF Invalido',
                container: '#alerts-container',
                placement: 'top-right',
                duration: 4,
                type: 'info',
                show: true
            });
        }
    };
});