app.controller('EventoCadastroCtrl', function ($scope, $http, $location, $routeParams, $alert) {

    $scope.form = {};
    $scope.tabActive = true;

    $scope.init = function () {
        var id = $routeParams.id;
        if (id) {
            $scope.edit(id);
        }
    }

    $scope.edit = function (id) {
        $http.post(
                Routing.generate('evento_edit', { id: id }))
            .success(function (response) {
                if (response.success) {
                    console.log(response.data);
                    var obj = {
                        id: response.data.id,
                        titulo: response.data.titulo,
                        descricao: response.data.descricao,
                        inscricaoInicio: new Date(response.data.inscricao_inicio),
                        inscricaoFim: new Date(response.data.inscricao_fim),
                        dataInicio: new Date(response.data.data_inicio),
                        dataFim: new Date(response.data.data_fim),
                        descricao: response.data.descricao,
                        local: response.data.local,
                        publicar: response.data.publicar,
                        valorEstudante: response.data.valor_estudante,
                        valorEstudanteAssociado: response.data.valor_estudante_associado,
                        valorNSocio: response.data.valor_n_socio,
                        valorSocio: response.data.valor_socio,
                        cargaHoraria: response.data.carga_horaria,
                        eventoPago: response.data.evento_pago,
                    };

                    $scope.form = obj;
                    return;
                }
            });
    }

    $scope.save = function () {
        var form = angular.copy($scope.form);

        $http.post(
            Routing.generate('evento_save')
            , form)
            .success(function (response) {
                if (response.success) {
                    $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'success', show: true});
                    $location.path('/evento');
                    return;
                }

                $alert({title: 'MENSAGEM: ', content: response.message, container: '#alerts-container', placement: 'top-right', duration: 4, type: 'info', show: true});

            });
    }
});