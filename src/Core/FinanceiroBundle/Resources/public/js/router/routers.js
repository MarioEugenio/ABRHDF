app.config(['$routeProvider', '$interpolateProvider',
    function($routeProvider) {

        $routeProvider.
            when('/financeiro/:id', {
                templateUrl: Routing.generate('financeiro'),
                controller: 'FinanceiroCtrl'
            });
    }]);
