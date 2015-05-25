app.controller('UserCadastroJuridicoCtrl', function ($scope, $http, $location, $routeParams, $alert) {

    $scope.form = {};
    $scope.contato = {};
    $scope.complemento = {};
    $scope.empresa = {};

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
                        $location.path('/user/' + response.data.id + '/representantes');
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