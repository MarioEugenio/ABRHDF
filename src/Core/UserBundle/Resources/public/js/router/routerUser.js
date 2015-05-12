app.config(['$routeProvider', '$interpolateProvider',
    function($routeProvider) {

        $routeProvider.
            when('/user/cadastro', {
                templateUrl: Routing.generate('user_cadastro'),
                controller: 'UserCadastroCtrl'
            }).
            when('/user/:id/edit', {
                templateUrl: Routing.generate('user_cadastro'),
                controller: 'UserCadastroCtrl'
            }).
            when('/user', {
                templateUrl: Routing.generate('user_lista'),
                controller: 'UserListaCtrl'
            }).
            when('/', {
                templateUrl: Routing.generate('core_home'),
                controller: 'UserListaCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
