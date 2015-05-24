app.controller('LoginCtrl', function ($scope, $http, $alert) {

    $scope.form = {};
    $scope.verify = {};
    $scope.tipo = false;
    $scope.login = true;
    $scope.tipoFisico = false;
    $scope.tipoJuridico = false;

    $scope.form = {};
    $scope.contato = {};
    $scope.complemento = {};

    $scope.dateOptions = {
        changeYear: true,
        changeMonth: true
    };

    $scope.estados = [];
    $scope.cidades = [];

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
        $scope.form = {};
        $scope.verify = {};
        $scope.tipo = false;
        $scope.login = true;
        $scope.tipoFisico = false;
        $scope.tipoJuridico = false;
        $scope.tipoRepresentantes = false;
        $scope.tipoDependentes = false;
    };

    $scope.autenticar = function () {
        var form = angular.copy($scope.form);

        $http.post(
            Routing.generate('user_auth'), form)
            .success(function (response) {
                if (response.success) {
                    window.location = baseUrl + '/core/admin';
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});
            });
    };

    $scope.cadastrar = function () {
        $scope.tipo = true;
        $scope.login = false;
    };

    $scope.fisico = function () {
        $scope.form.email = $scope.verify.email;
        $scope.tipo = false;
        $scope.tipoFisico = true;
        $scope.formulario = Routing.generate('user_cadastro');

    };

    $scope.juridico = function () {
        $scope.form.email = $scope.verify.email;
        $scope.tipo = false;
        $scope.tipoJuridico = true;
        $scope.formulario = Routing.generate('user_cadastro_juridico');
    };

    $scope.dependentes = function (id) {
        $scope.form = {
            id_fisico:id
        };
        $scope.tipoFisico = false;
        $scope.tipoDependentes = true;
        $scope.formulario = Routing.generate('user_lista_dependentes');
    };

    $scope.representantes = function (id) {
        $scope.form = {
            id_juridico:id
        };
        $scope.tipoJuridico = false;
        $scope.tipoRepresentantes = true;
        $scope.formulario = Routing.generate('user_lista_representantes');
    };

    $scope.cadastroFisico = function () {
        var form = angular.copy($scope.form);
        var contato = angular.copy($scope.contato);
        var complemento = angular.copy($scope.complemento);
        $http.post(
            Routing.generate('user_save')
            , {form: form , contato: contato, complemento: complemento})
            .success(function (response) {
                if (response.success) {
                    $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});

                    $scope.dependentes(response.data.id);
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});

            });
    };

    $scope.cadastroJuridico = function () {
        var form = angular.copy($scope.form);
        var contato = angular.copy($scope.contato);
        var complemento = angular.copy($scope.complemento);
        var empresa = angular.copy($scope.empresa);

        $http.post(
            Routing.generate('user_save_juridico')
            , {form: form , contato: contato, complemento: complemento, empresa: empresa})
            .success(function (response) {
                if (response.success) {
                    $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                    $scope.representantes(response.data.id);
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});

            });
    };


    $scope.list = [];
    $scope.page = 0;

    $scope.init = function () {
        $scope.getInfo();
    };

    $scope.getInfo = function () {
        $http.post(
            Routing.generate('user_edit', { id: $routeParams.id }))
            .success(function (response) {
                if (response.success) {
                    $scope.form.id_fisico = response.data.form.id;
                    $scope.listar();
                }
            });
    };

    $scope.limpar = function () {
        if ($scope.tipoDependentes) {
            var id = $scope.form.id_fisico;
            $scope.form = {
                id_fisico: id
            };
            $scope.form.id_fisico = id;
        }

        if ($scope.tipoRepresentantes) {
            var id = $scope.form.id_juridico;
            $scope.form = {
                id_juridico: id
            };
            $scope.form.id_juridico = id;
        }
    };

    $scope.edit = function (id) {
        if ($scope.tipoDependentes) {
            $http.post(
                Routing.generate('user_edit_dependentes', {id: id}))
                .success(function (response) {
                    if (response.success) {
                        $scope.form = response.data.form;
                        return;
                    }
                });
        }
        if ($scope.tipoRepresentantes) {
            $http.post(
                Routing.generate('user_edit_representante', { id: id }))
                .success(function (response) {
                    if (response.success) {
                        $scope.form = response.data.form;
                        return;
                    }
                });
        }
    };

    $scope.remove = function(index, id) {
        var conf = confirm('Tem certeza que deseja excluir o registro?');

        if (conf) {

            if ($scope.tipoDependentes) {
                $http.post(
                    Routing.generate('user_remove_dependentes'), {id: id})
                    .success(function (response) {
                        if (response.success) {
                            $scope.list.items.splice(index, 1);
                            $scope.listar();
                            $alert({
                                title: 'MENSAGEM: ',
                                content: response.message,
                                container: '#alerts-container',
                                placement: 'top-right',
                                duration: 4,
                                type: 'success',
                                show: true
                            });
                            $scope.limpar();
                            return;
                        }

                        $scope.list = [];
                    });
            }

            if ($scope.tipoRepresentantes) {
                $http.post(
                    Routing.generate('user_remove_representantes'), { id: id})
                    .success(function (response) {
                        if (response.success) {
                            $scope.list.items.splice(index, 1);
                            $scope.listar();
                            $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                            $scope.limpar();
                            return;
                        }

                        $scope.list = [];
                    });
            }
        }
    };

    $scope.buscar = function () {
        $scope.page = 0;
        $scope.listar();
    };

    $scope.listar = function () {

        if ($scope.tipoDependentes) {
            $http.post(
                Routing.generate('user_listar_dependentes'),{page:$scope.page,  id_fisico: $scope.form.id_fisico, searchText:$scope.searchText})
                .success(function (data) {
                    if (data.success) {
                        $scope.list = data.data;
                        return;
                    }

                    $scope.list = [];
                });
        }

        if ($scope.tipoRepresentantes) {
            $http.post(
                Routing.generate('user_listar_representantes'),{page:$scope.page,  id_juridico: $scope.form.id_juridico, searchText:$scope.searchText})
                .success(function (data) {
                    if (data.success) {
                        $scope.list = data.data;
                        return;
                    }

                    $scope.list = [];
                });
        }
    };

    $scope.cadastroDependentes = function () {
        var form = angular.copy($scope.form);
        $http.post(
            Routing.generate('user_save_dependentes')
            , {form: form})
            .success(function (response) {
                if (response.success) {
                    $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                    $scope.limpar();
                    $scope.listar();
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});

            });
    };

    $scope.cadastroRepresentantes = function () {
        var form = angular.copy($scope.form);
        $http.post(
            Routing.generate('user_save_representante')
            , {form: form})
            .success(function (response) {
                if (response.success) {
                    $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                    $scope.limpar();
                    $scope.listar();
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});

            });
    };
});
