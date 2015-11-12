/**
 * Created by Admin on 11/12/15.
 */

angular.module('planos', ['ngRoute', 'ngResource'])
    .config(function($routeProvider){
        $routeProvider
            .when('/', {
                templateUrl: '/assets/js/views/home.html',
                controller: 'PlanosController'
            })
    });