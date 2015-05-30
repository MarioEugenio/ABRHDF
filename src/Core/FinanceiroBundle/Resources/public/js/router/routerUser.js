app.config(['$routeProvider', '$interpolateProvider',
    function($routeProvider) {

        $routeProvider.
            when('/user/cadastro', {
                module: ["ui.mask"],
                templateUrl: Routing.generate('user_cadastro'),
                controller: 'UserCadastroCtrl'
            }).
            when('/user/cadastro/juridico', {
                templateUrl: Routing.generate('user_cadastro_juridico'),
                controller: 'UserCadastroJuridicoCtrl'
            }).
            when('/user/:id/edit', {
                templateUrl: Routing.generate('user_cadastro'),
                controller: 'UserCadastroCtrl'
            }).
            when('/user/:id/edit/juridico', {
                templateUrl: Routing.generate('user_cadastro_juridico'),
                controller: 'UserCadastroJuridicoCtrl'
            }).
            when('/user', {
                templateUrl: Routing.generate('user_lista'),
                controller: 'UserListaCtrl'
            }).
            when('/user/juridico', {
                templateUrl: Routing.generate('user_lista_juridico'),
                controller: 'UserListaJuridicoCtrl'
            }).
            when('/user/:id/representantes', {
                templateUrl: Routing.generate('user_lista_representantes'),
                controller: 'UserListaRepresentantesCtrl'
            }).
            when('/user/:id/dependentes', {
                templateUrl: Routing.generate('user_lista_dependentes'),
                controller: 'UserListaDependentesCtrl'
            }).
            when('/', {
                templateUrl: Routing.generate('core_home'),
                controller: 'UserListaCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
