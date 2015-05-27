var app = angular.module('COLIH', ['ngRoute', 'mgcrea.ngStrap', 'maskMoney', 'ui.mask', 'ui.date', 'frapontillo.bootstrap-switch','ngCpfCnpj'])
    .run(['$rootScope',
        function($scope) {

            $scope.formatarData = function (date) {
                if (date == null || date == undefined)
                    return;

                date = new Date(date);

                var curr_date = date.getDate();
                var curr_month = date.getMonth() + 1;
                var curr_year = date.getFullYear();

                return ((curr_date.toString().length == 1)? '0' + curr_date.toString() : curr_date.toString())
                    + "/" + ((curr_month.toString().length == 1)? '0' + curr_month.toString() : curr_month.toString())
                    + "/" + curr_year;
            }

            $scope.real = {
                prefix: 'R$'
            }

        }
    ])
    .config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    }
);
app.factory("currentUser", function($http) {
    return {
        getSessions: function() {
            return $http.post(Routing.generate('user_get'));
        }
    };
});