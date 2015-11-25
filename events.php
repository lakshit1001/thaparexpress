<?php
include('config.php');
$query = "SELECT * FROM `events` ORDER BY  id DESC";
$result = mysql_query($query) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thapar Express</title>
        <meta name="description" content="One stop for all of Thapar. THAPAR EXPRESS" />
        <meta name="keywords" content="" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">        <link rel="stylesheet" type="text/css" href="css/normalize.css" />        
        <link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/timeline.css">        <script src="js/modernizr.custom.js"></script>
        <script language = "JavaScript">
        function preloader()
        {
        heavyImage = new Image();
        heavyImage.src = "/images/bg2.png";
        }
        </script>
    </head>
    <body>
        <div class="container">
        <!-- here is the menu file -->
                <?php include('menu.php');?><!--THIS IS IT--><div class="content_main" >                
                <!-- Title -->                                
                <div class="col-lg-12">
<h1 class="page-header">EVENTS <small>From every society</small></h1>
</div><br>                <ol class="breadcrumb">
                    <li><a href="index">Home</a></li>
                    <li class="active">Events</li>
                </ol><!--
                <div class="row carousel-holder">                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li class="" data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li class="" data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>                </div>-->                </br>
                </br>                                <div class="row">
                                <div class="not_time">
                                            <ul class="timeline">
                                            <?php
                                                $a=1;                                            while($row = mysql_fetch_array($result)){
                                        $a++;
                                        if (($a%2)==0)
                                            {
                                                echo "<li ><div class=\"timeline-badge danger\"><i class=\"fa fa-graduation-cap\"></i>
                                                        </div>";
                                            }
                                            else { echo "<li class=\"timeline-inverted\"><div class=\"timeline-badge primary\"><i class=\"fa fa-graduation-cap\"></i>
                                                        </div>
                                            ";}
                                            ?>                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <h3 class="timeline-title"><?php echo $row['name']; ?></h3>
                                                                </div>
                                                            <div class="timeline-body">
                                                                <p>
                                            <ul>
                                                    <li><b>Venue  -  </b><?php   echo $row['venue']; ?></li>
                                                    <li><b>Date   -  </b><?php   echo $row['date']; ?></li>
                                                    <li><b>Time   -  </b><?php   echo $row['time']; ?></li>
                                                    <li><b>Cost   -  </b><?php   echo $row['cost'] ;?></li>
                                                </ul> <hr>
                                            <?php echo   substr($row['short_description'],0,120) ;?>....</p><br>                                             <a class="btn btn-primary pull-right" href="event?id=<?php echo $row['id'];?>">View more</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php }?>                                                </ul>
                                                                    </div>                                                                    </div>                                <!-- /.row -->
        </div>                </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/classie.js"></script>        <script>
            new gnMenu( document.getElementById( 'gn-menu' ) );
        </script>
    </body>
</html>
