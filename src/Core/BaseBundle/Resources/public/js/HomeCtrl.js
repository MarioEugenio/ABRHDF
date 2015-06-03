app.controller('HomeCtrl', function ($scope, $http, $modal, currentUser) {

    currentUser.getSessions().success(function(response, status){
        $scope.currentUser = response.data;
    });

});