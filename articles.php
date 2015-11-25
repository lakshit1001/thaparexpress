<?php
    ob_start();
    session_start();
if(!isset($_SESSION['rollnum'])){
        $log=0;}
    else $log=1;


include('config.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Thapar Express | ThaparLogs</title>
		<meta name="description" content="One stop for all of Thapar. THAPAR EXPRESS" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/timeline.css">
    <script src="js/modernizr.custom.js" type="text/javascript"></script>
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.form.js"></script>
    <script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
					<!-- here is the menu file -->
				<?php include('menu.php');?>


<!--THIS IS IT--><div class="content_main" >


   <div class="row">
                         <div class="col-lg-12">
                             <h1 class="page-header">ThaparLogs
                             <small>Express yourself</small>
                             </h1>
                        </div>

                </div>


	<div class="row">


    <div class="col-md-12">

      <div class="panel">
        <div class="panel-body">



          <!--/stories-->
          <div class="row">
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-title" href="#"><img alt="" src="http://api.randomuser.me/portraits/thumb/men/58.jpg" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
               <h3>Google Developers' Fest </h3>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default">GDG Jalandhar</span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">Yesterday  • </small><br><br><a href="article?id=23" class="btn btn-primary">Read More</a>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br>
            </div>
          </div>
          <hr>

          <div class="row">
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-title" href="#"><img alt="" src="http://api.randomuser.me/portraits/thumb/women/56.jpg" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
              <h3>14 Useful Sites for Designers</h3>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default">Computer Science Department</span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">Yesterday • </small><br><br><a href="#" class="btn btn-primary">Read More</a>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br>
            </div>
          </div>
          <hr>

          <div class="row">
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-title" href="#"><img alt="" src="http://api.randomuser.me/portraits/thumb/men/29.jpg" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
              <h3>Measuring Your Link Building with Google Analytics</h3>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default">CC Society</span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">Yesterday •  </small><br><br><a href="#" class="btn btn-primary">Read More</a>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br>
            </div>
          </div>
          <hr>

          <div class="row">
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-title" href="#"><img alt="" src="http://api.randomuser.me/portraits/thumb/women/56.jpg" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
              <h3>Dramatically Raise the Value of Any Piece of Content with These 27 Tactics</h3>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default">Mechanical Department</span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">2 days ago •  </small><br><br><a href="#" class="btn btn-primary">Read More</a>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br>
            </div>
          </div>
          <hr>

          <div class="row">
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-title" href="#"><img alt="" src="http://api.randomuser.me/portraits/thumb/men/29.jpg" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
              <h3>TrendPaper - What's Trending in the World</h3>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default">betali.st</span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">Last week • </small><br><br><a href="#" class="btn btn-primary">Read More</a>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br>
            </div>
          </div>
          <hr>
          <!--/stories-->


          <a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a>


        </div>
      </div>



   	</div><!--/col-12-->
  </div>

		</div><!-- /container -->
    <script src="js/classie.js" type="text/javascript"></script>
    <script type="text/javascript">


    new gnMenu( document.getElementById( 'gn-menu' ) );



    </script>
	</body>
</html>
