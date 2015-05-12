var app = angular.module('COLIH', ['ngRoute', 'mgcrea.ngStrap'])
    .config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    }
);

$('.menu li').click(function(e) {
    $('ul.nav > li').removeClass('active');
    $(this).addClass('active');
});