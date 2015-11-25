<?php
include('config.php');
$id=$_GET['id'];
$query = "SELECT * FROM `societies` WHERE `category` =  '". $id ."'";
$result = mysql_query($query) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Thapar Express | Societies</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container col-sm-12">
					<!-- here is the menu file -->
				<?php include('menu.php');?>
<!--THIS IS IT--><div class="content_main" >
  <h1>Societies</h1>
<br>
					<ol class="breadcrumb">
							<li><a href="index">Home</a></li>
							<li><a class="active">Societies</a></li>
						</ol>
						<div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <p class="lead">Choose any category</p>
                <div class="list-group">
                    <a href="societies?id=Technical" class="list-group-item " >Technical</a>
                    <a href="societies?id=Cultural" class="list-group-item ">Cultural</a>
                    <a href="societies?id=StundentChapter" class="list-group-item  ">Student Chapters</a>
                </div>
            </div>
						<div class="col-sm-9">

							<!-- Page Header -->
							<div class="row">
								<div class="col-lg-12">
									<h1 class="page-header"><?php
									$Words = preg_replace('/(?<!\ )[A-Z]/', ' $0', $id);
									echo $id; ?>
									<small>Societies</small>
									</h1>
								</div>
							</div>

							<div class="row">
							<?php $k = 1; ?>
							<!-- /.row -->
							<?php while($row = mysql_fetch_array($result)){ ?>
							<!-- Projects Row -->
								<?php $k++; ?>
								<div class="col-sm-6 portfolio-item">
								<a href=<?php echo "\"society.php?id=" . $row['username'] . "\"" ?>>
									<img class="img-responsive" src=<?php echo "\"images/soc/" . $row['id'] . ".png\"";  ;?>alt="">
								</a>
								<h3>
									<a href=<?php echo "\"society.php?id=" . $row['username'] . "\"" ?>><?php echo $row['name'] ?></a>
								</h3>
									<p><?php echo $row['about'];?></p>
								</div>

								<?php if($k%2==1){ ?>
									</div>
									<div class="row">
								<?php }} ?>

								</div>
								<!-- /.row -->

            </div>
    <!-- Page Content -->
    </div>
    <!-- /.container -->
    </div>
    <!-- /.container -->
	  <footer class="footer">
			<br>
			
			<br>
    </footer>
        </div><!-- /container -->
		<script src="js/classie.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>
