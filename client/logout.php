<?php
session_start();
if(isset($_SESSION['status']))
{
	$_SESSION['status'] = -1 ;
}

header('Location: ../client/home.php')
?>