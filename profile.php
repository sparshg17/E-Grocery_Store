<?php
	
	include("functions.php");
	$con=mysqli_connect("localhost","root","","signup");
	if(mysqli_connect_errno()){
		echo"Error caught while connecting with database".mysqli_connect_errno();
	}
	
	if(logged_in())
	{
		echo "You are logged in";
	}
	else
	{
		echo "You are not logged in";
	}
	
?>
		