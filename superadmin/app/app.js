var app = angular.module('myApp', ['ngRoute', 'ui.bootstrap', 'ngAnimate','ngFileUpload']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/', {
      title: 'Students',
      templateUrl: 'partials/students.html',
      controller: 'studentsCtrl'
    })
    .when('/societies', {
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
    .when('/blogs', {
      title: 'blogs',
      templateUrl: 'partials/blogs.html',
      controller: 'blogsCtrl'
    })
    .when('/blog_posts', {
      title: 'blog_posts',
      templateUrl: 'partials/blog_posts.html',
      controller: 'blog_postsCtrl'
    })
    .when('/albums', {
      title: 'albums',
      templateUrl: 'partials/albums.html',
      controller: 'albumsCtrl'
    })
.when('/pictures', {
      title: 'pictures',
      templateUrl: 'partials/pictures.html',
      controller: 'picturesCtrl'
    })
.when('/store_items', {
      title: 'store_items',
      templateUrl: 'partials/store_items.html',
      controller: 'store_itemsCtrl'
    })
.when('/teachers', {
      title: 'teachers',
      templateUrl: 'partials/teachers.html',
      controller: 'teachersCtrl'
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