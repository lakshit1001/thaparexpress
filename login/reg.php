<?php
include ('config.php');
?>
<style type="text/css">
body { background-image: url("../images/bg.jpg")
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color: #fff;font-size:18px; color:#000; margin:5px 5px 5px 10px; 
}


.success{
		width:30%;
		background-size: 40px 40px;
		background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 55%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);										
		 box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 border: 1px solid;
		 color: #fff;
		 padding: 5px;
		 
		 z-index:4;
		 text-shadow: 0 1px 0 rgba(0,0,0,.5);
		 animation: animate-bg 5s linear infinite;
		 background-color: #61b832;
		 border-color: #55a12c;
		 }
.errormsgbox{
		width:30%;
		background-size: 40px 40px;
		background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 55%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);										
		 box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 border: 1px solid;
		 color: #fff;
		 padding: 5px;
		 
		 z-index:4;
		 text-shadow: 0 1px 0 rgba(0,0,0,.5);
		 animation: animate-bg 5s linear infinite;
		 background-color: #de4343;
		 border-color: #c43d3d;

		 }

</style>
<?php
if (isset($_POST['formsubmitted'])) {
    $error = array();//Declare An Array to store any error message  
    
    if (empty($_POST['name'])) {//if no name has been supplied 
        $error[] = 'Please Enter a name ';//add to array "error"
    } else {
        $name = $_POST['name'];//else assign it a variable
    }

if (empty($_POST['rollnum'])) { 
        $error[] = 'Please Enter a rollnum ';
    } else {
        $rollnum = $_POST['rollnum'];//else assign it a variable
    }
if (empty($_POST['year'])) { 
        $error[] = 'Please Enter a year' ;
    } else {
        $year = $_POST['year'];//else assign it a variable
    }
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
if (empty($_POST['branch'])) { 
        $error[] = 'Please Enter a branch' ;
    } else {
        $branch = $_POST['branch'];//else assign it a variable
    }



  if (empty($_POST['email'])) {//if no name has been supplied 
        $error[] = 'Please Enter your E-Mail ';//add to array "error"
    } else {
           $email = $_POST['email'];
      

            }

if (empty($_POST['mobile'])) { 
        $error[] = 'Please Enter a mobile' ;
    } else {
        $mobile = $_POST['mobile'];//else assign it a variable
    }
    if (empty($_POST['password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $password = $_POST['password'];
    }
	
		
	if (empty($error)) //send to Database if there's no error '

    { // If everything's OK...

        // Make sure the email address is available:
        $query_verify_email = "SELECT * FROM members  WHERE email ='$email'";
        
        $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Email Already Taken! ';
        }
		
        $query_verify_rollnum = "SELECT * FROM members  WHERE rollnum ='$rollnum'";
        $result_verify_rollnum = mysqli_query($dbc, $query_verify_rollnum);
        if (!$result_verify_rollnum) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo 'You already have an account with that roll number.';
        }

        $query_verify_mobile = "SELECT * FROM members  WHERE mobile ='$mobile'";
        $result_verify_mobile = mysqli_query($dbc, $query_verify_mobile);
        if (!$result_verify_mobile) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo 'That mobile number is already registered.';
        }

                
        
        

        if ((mysqli_num_rows($result_verify_email) == 0) && (mysqli_num_rows($result_verify_rollnum) == 0)) { // IF no previous user is using this email .


            // Create a unique  activation code:
            $activation = md5(uniqid(rand(), true));


            $query_insert_user = "INSERT INTO `members`( `name`, `rollnum`, `year`, `branch`, `email`, `mobile`, `password`, `activation`,`hostel`,`gender`) VALUES ( '$name', '$rollnum', '$year', '$branch', '$email', '$mobile', '$password', '$activation','hostel','gender')";


            $result_insert_user = mysqli_query($dbc, $query_insert_user);
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }

            if (mysqli_affected_rows($dbc) == 1) { //If the Insert Query was successfull.


                // Send the email:
                $link = $site . '/activate?email=' . urlencode($email) . "&key=$activation";
				$message = " Hi, ". $name ." .<br> "."</br>Welcome to <b>Thapar Express</b>. <br> <br> To activate your Tx Account and be a part of Thapar Express, please click on this link or copy and paste it in your browser : <br><br>";
                $message .= '<a href="' . $link . '">' . $link . '</a>';
				$message .= "<br></br>Let's make <b>Thapar</b> a better place to be at.<br>";
                $message .= " <br> <br> Cheers, <br>Your friends at Tx.";
				$headers = "From: " . $mail . "\r\n";
				$headers .= "Reply-To: ". $mail . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($email, 'Welcome to Thapar Express', $message, $headers);                // Flush the buffered output.


                // Finish the page:
                echo '<div class="success"><p class="ta"> Thank you for registering! A confirmation email
							has been sent to '.$email.' Please click on the Activation Link to Activate your account </p></div>';


            } else { // If it did not run OK.
                echo '<div class="errormsgbox"><p class="ta"> You could not be registered due to a systemerror. We apologize for any inconvenience.</p></div>';
            }

        } else { // The email address is not available.
            echo '<div class="errormsgbox" ><p class="ta">That email address has already been registered.</p>
</div>';
        }

    } else {//If the "error" array contains error msg , display them
        
        

echo '<div class="errormsgbox"> ';
        foreach ($error as $key => $values) {
            
            echo '	<p class="ta">'.$values.'</p>';


       
        }
        echo '</div>';

    }
  
    mysqli_close($dbc);//Close the DB Connection

 // End of the main Submit conditional.

}
else
{header("Location: http://thaparexpress.in/index.php");
}
?>