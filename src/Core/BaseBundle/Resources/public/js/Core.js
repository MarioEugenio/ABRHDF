var app = angular.module('COLIH', ['ngRoute', 'mgcrea.ngStrap', 'maskMoney', 'ui.mask', 'ui.date', 'frapontillo.bootstrap-switch'])
    .run(['$rootScope',
        function($scope) {

            $scope.real = {
                prefix: 'R$'
            }

        }
    ])
    .config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    }
);