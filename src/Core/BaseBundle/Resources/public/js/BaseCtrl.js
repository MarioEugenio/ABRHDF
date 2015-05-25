app.controller('BaseCtrl', function ($scope, $http, $modal) {
    $scope.listEventos = [];
    $scope.listFisica = [];
    $scope.listJuridica = [];

    $scope.init = function () {
        $scope.listar();
        $scope.listarPessoaFisica();
        $scope.listarPessoaJuridica();
    }

    $scope.listar = function () {
        $http.post(
                Routing.generate('evento_listar'))
            .success(function (data) {
                if (data.success) {
                    $scope.listEventos = data.data;
                    return;
                }

                $scope.listEventos = [];
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

    $scope.animationsEnabled = true;

    $scope.openModalEvento = function ( id ) {
        $modal({scope: $scope, template: '/ABRHDF/web/app_dev.php/evento/' + id + '/detalhe', show: true});
    };

    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };
});