<?php 
include('config.php');
if (isset($_POST['formsubmitted'])) 
{  
    $rollnum = '';
    $gender = '';
    $password = '';
    $hostel = '';
    $mobile = '';
    $rollnum = $_POST['rollnum'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $hostel = $_POST['hostel'];
    $mobile = $_POST['mobile'];

   

   
     $query5 = "UPDATE `members` SET gender='$gender',hostel='$hostel',activation=NULL,mobile='$mobile',password='$password' WHERE rollnum ='$rollnum' LIMIT 1" ; 
    $result5 = mysql_query($query5) or die(mysql_error());
  echo 1 ; 
}
?>
<!DOCTYPE html>


<html>

<head>


    <title>Thapar Express | Register</title>


        <meta charset="utf-8">


        <meta name="google-site-verification" content="KoxyJJZ2Y3RvONGZBKpFKrEktEv-P63nxyoLdNTkh4Q" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/component.css" />
                    <link href="css/style.css" rel='stylesheet' type='text/css' />





</head>


<body>
                    <!-- here is the menu file -->
                <?php include('../menu.php');?>
                 <!-----start-main---->


                <div class="login-form">

                <form method="post" action="register.php">
                    <li>
                        <input required name="rollnum" required="required" id="rollnum" type="text" class="text"  placeholder="ROLL NUMBER">
                   </li>

                     <li>
                     <input required name="mobile" required="required" id="rollnum" type="text" class="text"  placeholder="MOBILE(10digit)">
                       </li>
                    <li>
                        <select name="hostel" class="form-control">
                            <option value="n">No Hostel</option>
                            <option value="a">Hostel A</option>
                            <option value="b">Hostel B</option>
                            <option value="c">Hostel C</option>
                            <option value="i">Hostel E</option>
                            <option value="g">Hostel G</option>
                            <option value="i">Hostel H</option>
                            <option value="i">Hostel I</option>
                            <option value="i">Hostel J</option>
                            <option value="pg">PG Hostel</option>
                            <option value="frc">Hostel FRC</option>
                        </select>

                    </li>
                    <li>
                        <select required name="gender" class="form-control">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </li>
                    <li>
                        <input required name="password" required="required"  id="password" type="password" placeholder="PASSWORD" >
                    </li>
                                <input type="hidden" name="formsubmitted" value="TRUE" />
                    <div class="p-container">
                       <a class="reg_button"  href="index.php" class="reg_button">Login in</a>
                                <input type="submit" onclick="myFunction()" class="log_button" value="Sign Up" >
                                <div class="clear"> </div>
                    </div>
                    <div class="p-container">
                    </div>
                </form>


            </div>


            <!--//End-login-form-->


            


                </div></div>


            <script src="../js/classie.js"></script>


            <script src="../js/modernizr.custom.js"></script>


  


        <script>


            new gnMenu( document.getElementById( 'gn-menu' ) );


        </script>





                


</body>


</html>


