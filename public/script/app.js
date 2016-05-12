 var app = angular.module('articleApp', [], function($interpolateProvider) {
   // To change the default angular expression delimiters
//    $interpolateProvider.startSymbol('<%'); 
//    $interpolateProvider.endSymbol('%>');
 });
 app.controller('articleCtrl', ['$scope', function ($scope) {
    $scope.yo = "msg";
 }]);