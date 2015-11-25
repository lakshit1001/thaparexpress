var app = angular.module('myApp', ['ngRoute', 'ui.bootstrap', 'ngAnimate','ngFileUpload']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/', {
      title: 'societies',
      templateUrl: 'partials/societies.html',
      controller: 'societiesCtrl'
    })
    .when('/societies_members', {
      title: 'societies_members',
      templateUrl: 'partials/societies_members.html',
      controller: 'societies_membersCtrl'
    })
    .when('/mega_events', {
      title: 'mega_events',
      templateUrl: 'partials/mega_events.html',
      controller: 'mega_eventsCtrl'
    })
    .when('/events', {
      title: 'events',
      templateUrl: 'partials/events.html',
      controller: 'eventsCtrl'
    })
    .when('/event_updates', {
      title: 'event_updates',
      templateUrl: 'partials/event_updates.html',
      controller: 'event_updatesCtrl'
    })
.when('/students', {
      title: 'students',
      templateUrl: 'partials/students.html',
      controller: 'studentsCtrl'
    })
    .otherwise({
      redirectTo: '/'
    });;
}]);