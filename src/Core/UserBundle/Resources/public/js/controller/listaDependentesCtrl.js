app.controller('UserListaDependentesCtrl', function ($scope, $http, $alert, $routeParams) {

    $scope.list = [];
    $scope.page = 0;
    $scope.form = {
        id_fisico:null
    };

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
    $scope.getInfo();
    $scope.limpar = function () {
        var id = $scope.form.id_fisico;
        angular.element($('#dtNascimento')).val('');
        $scope.form = {
            id_fisico: id
        };
        $scope.form.id_fisico = id;
    };

    $scope.edit = function (id) {
        $http.post(
            Routing.generate('user_edit_dependentes', { id: id }))
            .success(function (response) {
                if (response.success) {
                    $scope.form = response.data.form;
                    $scope.form.dataNascimento = new Date(response.data.form.dataNascimento);
                    return;
                }
            });
    };

    $scope.remove = function(index, id) {
        var conf = confirm('Tem certeza que deseja excluir o registro?');

        if (conf) {
            $http.post(
                    Routing.generate('user_remove_dependentes'), { id: id})
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
    };

    $scope.buscar = function () {
        $scope.page = 0;
        $scope.listar();
    };

    $scope.listar = function () {
        $http.post(
            Routing.generate('user_listar_dependentes'),{page:$scope.page,  id_fisico: $scope.form.id_fisico, searchText:$scope.searchText})
            .success(function (data) {
                if (data.success) {
                    $scope.list = data.data;
                    return;
                }

                $scope.list = [];
            });
    };

    $scope.save = function () {
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

});