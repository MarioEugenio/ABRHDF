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
            when('/desconto', {
                templateUrl: Routing.generate('desconto_lista'),
                controller: 'DescontoListaCtrl'
            }).
            when('/desconto/cadastro', {
                templateUrl: Routing.generate('desconto_cadastro'),
                controller: 'DescontoCadastroCtrl'
            }).
            when('/desconto/:id/edit', {
                templateUrl: Routing.generate('desconto_cadastro'),
                controller: 'DescontoCadastroCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
