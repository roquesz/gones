angular.module('app.routes', [])

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider



  .state('menu.desaparecidos', {
    url: '/gones',
    views: {
      'side-menu21': {
        templateUrl: 'templates/desaparecidos.html',
        controller: 'desaparecidosCtrl'
      }
    }
  })

  .state('detalhes', {
    url: '/details',
    templateUrl: 'templates/detalhes.html',
    controller: 'detalhesCtrl'
  })

  .state('menu.fAQ', {
    url: '/faq',
    views: {
      'side-menu21': {
        templateUrl: 'templates/fAQ.html',
        controller: 'fAQCtrl'
      }
    }
  })

  .state('menu.informaEs', {
    url: '/info',
    views: {
      'side-menu21': {
        templateUrl: 'templates/informaEs.html',
        controller: 'informaEsCtrl'
      }
    }
  })

  .state('menu.sobreOProjeto', {
    url: '/about',
    views: {
      'side-menu21': {
        templateUrl: 'templates/sobreOProjeto.html',
        controller: 'sobreOProjetoCtrl'
      }
    }
  })

  .state('menu.estatSticas', {
    url: '/statistcs',
    views: {
      'side-menu21': {
        templateUrl: 'templates/estatSticas.html',
        controller: 'estatSticasCtrl'
      }
    }
  })

  .state('menu.filtro', {
    url: '/filter',
    views: {
      'side-menu21': {
        templateUrl: 'templates/filtro.html',
        controller: 'filtroCtrl'
      }
    }
  })

  .state('menu', {
    url: '/side-menu',
    templateUrl: 'templates/menu.html',
    abstract:true
  })

$urlRouterProvider.otherwise('/side-menu/gones')


});
