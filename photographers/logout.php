<?php ob_start();    
session_start();
if(isset($_SESSION['superadmin'])){         
	session_destroy();}      
	header("Location: http://thaparexpress.com/superadmin/login.php");      
exit();?>