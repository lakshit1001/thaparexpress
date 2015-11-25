<?php
ob_start();
session_start();

  $username = "bookfoxi_tx1";
  $password = "laxarsh6!";
  $database = "bookfoxi_tx";
  $hostname = "localhost";

  $dbc = mysqli_connect($hostname, $username, $password, $database);
if (isset($_POST['formsubmitted'])) {

  $error = '';

  if (empty($_POST['password'])) {
    $error = 'Please Enter Your password ';
  } else {
    $password = $_POST['password'];
  }
  if (empty($_POST['email'])) {
    $error = 'You forgot to enter your Email id';
  }
  else {
    $email = $_POST['email'];
  }


  if (empty($error)){
      $query_check_credentials = "SELECT * FROM societies WHERE (email ='$email' AND password='$password')";
      $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
    if($result_check_credentials){
    

      $_SESSION['societylogin'] = $email;
      header("Location: http://thaparexpress.com/societylogin/index.php");
      exit();
    
    } 
    else {
    header("Location: http://thaparexpress.com/societylogin/login.php?e=WrongCredentials");
    exit();
    }
 
  }else {
    header("Location: http://thaparexpress.com/societylogin/login.php?e=" . $error);
    exit();
  }
}
?>
