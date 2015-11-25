<?php ob_start();    
session_start();
if(isset($_SESSION['societylogin'])){         
	session_destroy();}      
	header("Location: http://thaparexpress.com/societylogin/login.php");      
exit();?>