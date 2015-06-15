app.controller('HomeCtrl', function ($scope, $http, $modal, currentUser) {
    $scope.urlPerfil = "";

    currentUser.getSessions().success(function(response, status){
        $scope.currentUser = response.data;

        var id = response.data.id;
        if (response.data.tipoUsuario == 1) {
            $scope.urlPerfil = "#/user/" + id + "/edit";
        } else {
            $scope.urlPerfil = "#/user/" + id + "/edit/juridico";
        }
    });

});