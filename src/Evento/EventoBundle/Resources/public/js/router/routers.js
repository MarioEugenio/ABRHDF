app.config(['$routeProvider', '$interpolateProvider',
    function($routeProvider) {

        $routeProvider.
            when('/evento/cadastro', {
                templateUrl: Routing.generate('evento_cadastro'),
                controller: 'EventoCadastroCtrl'
            }).
            when('/evento/:id/edit', {
                templateUrl: Routing.generate('evento_cadastro'),
                controller: 'EventoCadastroCtrl'
            }).
            when('/evento', {
                templateUrl: Routing.generate('evento_lista'),
                controller: 'EventoListaCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
