angular.module('app.controllers', ['dataSourceModule'])

.controller('desaparecidosCtrl', function($scope, DataSourcService) {
  DataSourcService.getGones(function(data)
		{
			$scope.gones = data;
		});
})
//
// .controller('detalhesCtrl', function($scope) {
//
// })
//
// .controller('fAQCtrl', function($scope) {
//
// })
//
// .controller('informaEsCtrl', function($scope) {
//
// })
//
// .controller('sobreOProjetoCtrl', function($scope) {
//
// })
//
// .controller('estatSticasCtrl', function($scope) {
//
// })
//
// .controller('filtroCtrl', function($scope) {
//
// })
