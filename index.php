<?php
include('config.php');
$query1 = "SELECT * FROM `blog_posts` ORDER BY  blogid DESC LIMIT 5";
$result1 = mysql_query($query1) or die(mysql_error());
$query2 = "SELECT * FROM `events` ORDER BY  id DESC LIMIT 2";
$result2 = mysql_query($query2) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Thapar Express | Home</title>
		<meta name="description" content="One stop for all of Thapar. THAPAR EXPRESS" />
		<meta name="keywords" content="thapar express,thapar university,thaparexpress,thapar,express,all,of,thapar,events,thapar,societies,timetable,food in patiala,restaurants in patiala " />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/timeline.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
	<?php	include('menu.php');?>
				<div class="content_main" >
                    <div class="row">
                         <div class="col-lg-12">
                             <h1 class="page-header">Home</h1>
							 
                        </div>
						
                </div>
				 <!-- /.row -->
				 <!--
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">6</div>
                                    <div>New Notices!</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Thaparlogs!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">s2</div>
                                    <div>New Events!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-flag fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Society Updates!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div> -->
            <!-- /.row -->
            <div class="row">
			
		<div class="col-lg-4">
		<div class="panel panel-success">
           <div class="panel-heading"><!--<a href="#" class="pull-right btn btn-primary">View all</a>--> <h4>Timetable</h4></div>
   			<div class="panel-body">
              
				<div class="center">
<iframe src="https://www.google.com/calendar/embed?title=CML%202nd%20Year&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=lakshit1001%40gmail.com&amp;color=%232952A3&amp;ctz=Asia%2FCalcutta" style=" border-width:0 " width="100%" height="600" frameborder="0" scrolling="no"></iframe>        		</div>
            </div>
         </div>
		<div class="panel panel-primary">
           <div class="panel-heading"><a href="events.php" class="pull-right btn btn-default">View all</a> <h4>Events</h4></div>
   			<div class="panel-body">
              
				 <?php  while($row1 = mysql_fetch_array($result2)){ ?>			
												
											<a href="event?id=<?php echo $row1['id'];?>"><h4 class="text-center"><?php   echo $row1['name']; ?></h4></a>
											<ul> 
													<li><b>Venue  -  </b><?php   echo $row1['venue']; ?></li>
													<li><b>Time   -  </b><?php   echo $row1['time']; ?></li>
													<li><b>Cost   -  </b><?php   echo $row1['cost'] ;?></li>						   
											</ul>
											<br>
												 <?php }?>
          <!--/stories-->
												<
											
											<!-- <a class="btn btn-primary pull-right" href="event?id=12">View more></a> -->
														
													
            </div>
         </div></div>
		
				<div class="col-lg-8">
									
						<div class="panel panel-danger">
           <div class="panel-heading"><a href="articles.php" class="pull-right btn btn-default">View all</a> <h4>Thaparlogs</h4></div>
   			<div class="panel-body">
						  <!--/stories-->
						  
          <?php  while($row = mysql_fetch_array($result1)){ ?>
          <!--/stories-->
            <div class="row">    
							 
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-title" href="#"><img alt="" src="images/maneek.jpg" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
               <h3><?php echo $row['name']; ?>&nbsp;&nbsp;  <small>By <?php echo $row['blogger']; ?></small></h3>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default"><?php echo $row['timer']; ?></span></h4>
                  <h4>
                  <a href="article.php?id=<?php echo $row['blogid']; ?>" class="btn btn-primary">Read More</a>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
             
            </div>
         </div>
          <hr>
          <?php }?>
          <!--/stories-->
         
													  </div>
						  <hr>
						  <!--/stories-->
						  
						  
						<!--  <a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a> -->
						
										</div>
										<!-- /.panel-body -->
									</div>
									<!-- /.panel -->
								</div>
								<!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
		
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>