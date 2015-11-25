<?php $id=$_GET['id'];
include('config.php');
$query2 = "SELECT * FROM events WHERE id='$id'"; 	 
$result2 = mysql_query($query2) or die(mysql_error());
$event = mysql_fetch_array($result2) or die(mysql_error());

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Thapar Express | <?php   echo $event['name']; ?></title>
		<meta name="description" content="One stop for all of Thapar. THAPAR EXPRESS" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/timeline.css">
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
					<!-- here is the menu file -->
				<?php include('menu.php'); ?>
				
			
<!--THIS IS IT--><div class="content_main" >
					
        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php   echo $event['name']; ?>
                    <small></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li class="active">Here</li>
                </ol>
        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="superadmin/eventimg/<?php echo $event['image']?>" alt="">
            </div>

            <div class="col-md-4">
                <h3>Event Description</h3>
                <p><?php   echo $event['descrip']; ?></p>
                <h3>Event Details</h3>
                <ul>
                    <li><b>Venue  -  </b><?php   echo $event['venue'] ?></li>
                    <li><b>Date   -  </b><?php   echo $event['date'] ?></li>
                    <li><b>Time   -  </b><?php   echo $event['time'] ?></li>
                    <li><b>Cost   -  </b><?php   echo $event['cost'] ?></li>
                   
                </ul>
                <!--
			<a class="btn btn-primary pull-right" href="participate.php?id=<?php echo $event['id'];?>">Participate</a>
            -->
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row 
        <div class="row">
			</br>
            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>-->

        <hr>

            
                <div class="not_time">
                    
            
		</div><!-- /container -->
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>
