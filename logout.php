<?php 
ob_start();
    session_start();
if(isset($_SESSION['rollnum']))
{
         session_destroy();
}
header("Location: index");
?>