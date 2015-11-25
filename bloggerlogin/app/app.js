var app = angular.module('myApp', ['ngRoute', 'ui.bootstrap', 'ngAnimate']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/blogs', {
      title: 'blogs',
      templateUrl: 'partials/blogs.html',
      controller: 'blogsCtrl'
    })
    .when('/', {
      title: 'blog_posts',
      templateUrl: 'partials/blog_posts.html',
      controller: 'blog_postsCtrl'
    })
    .otherwise({
      redirectTo: '/'
    });;
}]);
