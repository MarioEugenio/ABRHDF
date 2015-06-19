app.controller('HomeCtrl', function ($scope, $http, $modal, currentUser, $alert) {
    $scope.urlPerfil = "";

    currentUser.getSessions().success(function(response, status){
        $scope.currentUser = response.data;

        var id = response.data.id;
        if (response.data.tipoUsuario == 1) {
            $scope.urlPerfil = "#/user/" + id + "/edit/"+1;
        } else {
            $scope.urlPerfil = "#/user/" + id + "/juridico/"+1;
        }
    });

    $scope.alter = false;

    $scope.alterarSenha = function () {
        $scope.alter = true;
        $scope.form = {
            senhaAtual: null,
            senha: null,
            rsenha:null
        }
    };

    $scope.close = function () {
        $scope.alter = false;
        $scope.form = {
            senhaAtual: null,
            senha: null,
            rsenha:null
        };
    };

    $scope.altSenha = function () {
        var valid = false;
        var message = '';

        if(!$scope.form.senhaAtual && !valid) {
            valid = true;
            message = 'Preencha a senha atual';
        }

        if(!$scope.form.senha && !valid) {
            valid = true;
            message = 'Preencha a senha';
        }

        if(!$scope.form.rsenha && !valid) {
            valid = true;
            message = 'Repita a senha';
        }
        console.log($scope.currentUser);
        if($scope.form.senhaAtual != $scope.currentUser.senha && !valid) {
            valid = true;
            message = 'Senha Atual incorreta';
        }

        if($scope.form.senha != $scope.form.rsenha && !valid) {
            valid = true;
            message = 'Senha incompativel com a senha repetida';
        }

        if (!valid){
            $http.post(
                Routing.generate('user_alter_senha'),{id:$scope.currentUser.id, senha: $scope.form.senha })
                .success(function (data) {
                    $scope.currentUser.senha =  $scope.form.senha;
                    $alert({title: 'MENSAGEM: ', content: 'Senha Alterada', container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                    $scope.close();
                });
        } else {
            $alert({title: 'MENSAGEM: ', content: message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});
        }
    };
});