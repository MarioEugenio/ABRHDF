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
    $scope.empresa = {};

    $scope.dateOptions = {
        changeYear: true,
        changeMonth: true
    };

    $scope.estados = [];
    $scope.cidades = [];
    $scope.listOperadoras = [
        { id: 'T', texto: 'TIM' },
        { id: 'C', texto: 'Claro' },
        { id: 'CT', texto: 'CTBC Telecom' },
        { id: 'O', texto: 'Oi' },
        { id: 'P', texto: 'Porto Seguro Conecta' },
        { id: 'V', texto: 'Vivo' },
        { id: 'S', texto: 'Sercomtel' },
        { id: 'N', texto: 'Nextel' }
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
        $scope.form = {};
        $scope.contato = {};
        $scope.complemento = {};
        $scope.empresa = {};
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
        $http.post(
            Routing.generate('user_valid_email'),{email:$scope.verify.email})
            .success(function (data) {
                if (data.data) {
                    $scope.tipo = true;
                    $scope.login = false;
                } else {
                    $alert({title: 'MENSAGEM: ', content: 'E-mail ja cadastrado', container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});
                }
            });
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
        if (!$('#cpf').hasClass('ng-invalid-cpf')) {
            $http.post(
                Routing.generate('user_save')
                , {form: form, contato: contato, complemento: complemento})
                .success(function (response) {

                    $alert({
                        title: 'MENSAGEM: ',
                        content: 'Fa�a o seu login para acessar o seu cadastro.',
                        container: '#alerts-container',
                        placement: 'top-right',
                        duration: 4,
                        type: 'success',
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

    $scope.cadastroJuridico = function () {
        var form = angular.copy($scope.form);
        var contato = angular.copy($scope.contato);
        var complemento = angular.copy($scope.complemento);
        var empresa = angular.copy($scope.empresa);

        var valid = false;

        if ($scope.empresa.cnpj == '00000000000000'){
            valid = true;
        }

        if (!$('#cnpj').hasClass('ng-invalid-cnpj')) {
        $http.post(
            Routing.generate('user_save_juridico')
            , {form: form , contato: contato, complemento: complemento, empresa: empresa})
            .success(function (response) {
                $alert({title: 'MENSAGEM: ', content: 'Fa�a o seu login para acessar o seu cadastro.', container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});

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
