<?php
ob_start();
session_start();
if(!(isset($_SESSION['superadmin']))){
  header("Location: http://thaparexpress.com/superadmin/login.php");
  exit();
}?> 
<html ng-app="myApp">
<body ng-cloak="">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styles.css">
  <!-- Navigation -->

    <!-- Page Content -->
      <section id="main-content">
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="">
         <center><img src="http://thaparexpress.com/admin/images/tx.png" /></center>
        </li><li class="sidebar-brand">
         <h2 style="color:white;">ThaparExpress</h2>
        </li>
        <li>
          <a href="#/societies">Societies</a>
        </li>
        <li>
          <a href="#/societies_members">Society Memebers</a>
        </li>
        <li>
          <a href="#/mega_events">Mega Events</a>
        </li>
        <li>
          <a href="#/events">Events</a>
        </li>
        <li>
          <a href="#/event_updates">Updates</a>
        </li>
        <li>
          <a href="#/blogs">Blogs</a>
        </li>
        <li>
          <a href="#/blog_posts">Blog Posts</a>
        </li>
        <li>
          <a href="#/albums">Albums</a>
        </li>
        <li>
          <a href="#/pictures">Pictures</a>
        </li>
        <li>
          <a href="#/store_items">Store Items</a>
        </li>
        <li>
          <a href="#/teachers">Teachers</a>
        </li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            
  
            <div ng-view id="ng-view"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
<!-- Libraries -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-animate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.11.2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- AngularJS custom codes -->
<script src="app/app.js"></script>
<script src="app/data.js"></script>
<script src="app/directives.js"></script>
<script src="app/studentsCtrl.js"></script>
<script src="app/societiesCtrl.js"></script>
<script src="app/societies_membersCtrl.js"></script>
<script src="app/mega_eventsCtrl.js"></script>
<script src="app/eventsCtrl.js"></script>
<script src="app/event_updatesCtrl.js"></script>
<script src="app/blogsCtrl.js"></script>
<script src="app/blog_postsCtrl.js"></script>
<script src="app/albumsCtrl.js"></script>
<script src="app/picturesCtrl.js"></script>
<script src="app/store_itemsCtrl.js"></script>
<script src="app/teachersCtrl.js"></script>

<!-- Some Bootstrap Helper Libraries -->
 

</body>
</html>