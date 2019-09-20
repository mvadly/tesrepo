<div ng-app="myApp" ng-controller="myCtrl">

<select ng-model="selectedName" ng-options="x for x in names">
</select>

</div>

<script>
var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope) {
	
    $scope.names = ['<?php foreach ($dfas as $key ) { echo $key['nama_fasilitas']; }?>'];
    
});

</script>

<p>This example shows how to fill a dropdown list using the ng-options directive.</p>