app.controller('UserListaRepresentantesCtrl', function ($scope, $http, $alert, $routeParams) {

    $scope.list = [];
    $scope.page = 0;
    $scope.empresa = {};
    $scope.empresaUser = {};
    $scope.form = {
        id_juridico:null
    };

    $scope.init = function () {
        $scope.getInfo();
    };

    $scope.getInfo = function () {
        $http.post(
            Routing.generate('user_edit', { id: $routeParams.id }))
            .success(function (response) {
                if (response.success) {
                    $scope.form.id_juridico = response.data.form.id;
                    $scope.empresaUser = response.data.form;
                    $scope.empresa = response.data.empresa;
                    $scope.listar();
                }
            });
    };
    $scope.getInfo();
    $scope.limpar = function () {
        var id = $scope.form.id_juridico;
        $scope.form = {
            id_juridico: id
        };
        $scope.form.id_juridico = id;
    };

    $scope.edit = function (id) {
        $http.post(
            Routing.generate('user_edit_representante', { id: id }))
            .success(function (response) {
                if (response.success) {
                    $scope.form = response.data.form;
                    return;
                }
            });
    };

    $scope.remove = function(index, id) {
        var conf = confirm('Tem certeza que deseja excluir o registro?');

        if (conf) {
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
    };

    $scope.buscar = function () {
        $scope.page = 1;
        $scope.listar();
    };

    $scope.listar = function () {
        $http.post(
            Routing.generate('user_listar_representantes'),{page:$scope.page,  id_juridico: $scope.form.id_juridico, searchText:$scope.searchText})
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