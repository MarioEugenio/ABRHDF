app.config(['$routeProvider', '$interpolateProvider',
    function($routeProvider) {

        $routeProvider.
            when('/login', {
                templateUrl: Routing.generate('user_login'),
                controller: 'LoginCtrl'
            }).
            otherwise({
                redirectTo: '/login'
            });
    }]);
