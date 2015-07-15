app.controller('HomeCtrl', function ($scope, $http, $modal, currentUser, $alert, $window) {
    $scope.urlPerfil = "";
    $scope.associado = false;

    currentUser.getSessions().success(function(response, status){
        $scope.currentUser = response.data;
        var id = response.data.id;
        if (response.data.tipoUsuario == 1) {
            $scope.urlPerfil = "#/user/" + id + "/edit/"+1;
        } else {
            $scope.urlPerfil = "#/user/" + id + "/edit/juridico/"+1;
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

    $scope.imprimir = function () {
        var w = 400;
        var h = 500;
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        $window.open(Routing.generate('user_print', {
            co_user: $scope.currentUser.id
        }), 'imprimir', 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left );
    };

    $scope.close = function () {
        $scope.alter = false;
        $scope.form = {
            senhaAtual: null,
            senha: null,
            rsenha:null
        };
    };

    $scope.closeAssociado = function () {
        $scope.associado = false;
    }

    $scope.pagamento = function (status) {
        return (status)? "Pagamento Efetivado" : "Pagamento Pendente";
    }

    $scope.verificarAssociado = function () {
        $scope.associado = true;
    }

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