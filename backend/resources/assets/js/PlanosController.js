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
        var data = {
            ddd_origin: $scope.DDDOrigem,
            ddd_receiver: $scope.DDDDestino,
            minutes: $scope.Minutes,
            plan: $scope.Plans
        };

        $http({
            method: 'POST',
            url: '/getConsumption',
            data: data
        }).then(function success(data){
            alert(data);
        }, function error(data){
            alert(data);
        });
    };


});