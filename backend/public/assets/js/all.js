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
/**
 * Created by Admin on 11/12/15.
 */
angular.module('planos')
.controller('PlanosController', function($http, $scope){
        $http.get('/getPlans').success(function(data){
            $scope.plans = data;
        });
        $http.get('/getDDD').success(function(data){
            $scope.ddds = data;
        });

    $scope.getRate = function(){
        alert($scope.Minutes);
    };


});
//# sourceMappingURL=all.js.map
