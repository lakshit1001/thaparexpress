<?php
ob_start();
    session_start();

include('config.php');
if (isset($_POST['formsubmitted'])) 
{  
    echo $_POST;
     echo $_GET;
    $error = array();//Declare An Array to store any error message  


    if (empty($_POST['gender'])) { 
        $error[] = 'Please Enter a gender' ;
    } else {
        $gender = $_POST['gender'];//else assign it a variable
    }
    if (empty($_POST['hostel'])) { 
        $error[] = 'Please Enter a hostel' ;
    } else {
        $hostel = $_POST['hostel'];//else assign it a variable
    }
    if (empty($_POST['mobile'])) { 
        $error[] = 'Please Enter a mobile num' ;
    } else {
        $mobile = $_POST['mobile'];//else assign it a variable
    }

    if (empty($_POST['rolnum'])) { 
        $error[] = 'Please Enter a gender' ;
    } else {
        $rollnum = $_POST['rollnum'];//else assign it a variable
    }
    if (empty($_POST['password'])) { 
        $error[] = 'Please Enter a password' ;
    } else {
        $password = $_POST['password'];//else assign it a variable
    }


echo $error;

    
echo 1;
        $query_verify_mobile = "SELECT * FROM members  WHERE mobile ='$mobile'";
        $result_verify_mobile = mysqli_query($dbc, $query_verify_mobile);
        if (!$result_verify_mobile) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo 'That mobile number is already registered.';
      
echo 3;
        }

        if (mysqli_num_rows($result_verify_mobile) == 0)  // IF no previous user is using this email .
           {

echo 4;
                $query5 = "UPDATE `members` SET gender='$gender',hostel='$hostel',activation=NULL,mobile='$mobile',password='$password' WHERE rollnum ='$rollnum' LIMIT 1" ; 
                $result5 = mysql_query($query5) or die(mysql_error());
                
            }



}
?>

