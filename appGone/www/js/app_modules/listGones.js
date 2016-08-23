	var appList = angular.module('listGones', ['dataSourceModule']);

	appList.controller('desaparecidosCtrl', function ($scope, DataSourcService, $location) {
		$scope.$emit('backButtonEvent', {backbutton: false});
		DataSourcService.getGones(function(data)
		{
			$scope.gones = data;
		});
	});
