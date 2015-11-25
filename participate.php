<?php 


    ob_start();
    session_start();
	$rollnum= $_SESSION['rollnum'];
$id=$_GET['id'];
if(!isset($_SESSION['rollnum'])){
       header("Location: http://thaparexpress.in/login/index.php");
    exit();
}

else{


include('config.php');

$query2 = "SELECT * FROM event_". $id ;
$result2 = mysql_query($query2) or die(mysql_error());
$level = (mysql_num_rows($result2) + 1);
            
			
			        $query_verify_rollnum = "SELECT * FROM event_". $id . "WHERE rollnum ='$rollnum'";
                $result_verify_rollnum = mysqli_query($dbc, $query_verify_rollnum);
        
	
		
	$query_insert_user = "INSERT into `event_". $id . "` (`participantid`,`rollnum`) values ('$level','$rollnum')"; 
            $result_insert_user = mysqli_query($dbc, $query_insert_user);
		
		$result_insert_user = mysqli_query($dbc, $query_insert_user);
           
		          header("Location: http://thaparexpress.in/events_all_auto.php");
    exit();

			
			

}
	