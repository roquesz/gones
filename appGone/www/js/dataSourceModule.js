var dataSourceModule = angular.module('dataSourceModule', []),
		url_host = 'http://localhost/gone/api/';

dataSourceModule.factory('DataSourcService', function ($http) {
	var obj = {};
	var gones;
	var firstRequest = true;

	obj.getGones = function (callback) {
		if (firstRequest) {
			firstRequest = false;
			$http.get(url_host + 'index.php')
				.success(function (data) {
					// console.console.log(gones);
					gones = data;
					callback(data);
				}).error(function () {

				})
		} else {
			callback(gones);
		}
	}

	return obj;
});
