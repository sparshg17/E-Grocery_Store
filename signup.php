<?php
	
	session_start();
	include("functions.php");
	$con=mysqli_connect("localhost","root","","signup");
	if(mysqli_connect_errno()){
		echo"Error occured while connecting with database".mysqli_connect_errno();
	}
	
	if(logged_in()){
		header("location:grocery.php");
		exit(0);
	}
	
	$error="";
	$success="";
	if(isset($_POST['SignUp']))
	{
		$firstname=mysqli_real_escape_string($con,$_POST['fname']);
		$lastname=mysqli_real_escape_string($con,$_POST['lname']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=$_POST['password'];
		$passwordconfirm=$_POST['passwordConfirm'];
		$conditon=isset($_POST['terms']);
		
		
		
		if(strlen($firstname)<3){
			$error="Firstname is too short";
		}
		else if(strlen($firstname)>10){
			$error="Firstname is too long";
		}
		else if(strlen($lastname)<3){
			$error="Lastname is too short";
		}
		else if(strlen($lastname)>10){
			$error="Lastname is too long";
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$error="Email is not valid";
		}
		else if(email_exists($email,$con)==TRUE){
			$error="Email already Exists";
		}
		else if(strlen($password)<5){
			$error="Password must be greator than 3 characters";
		}
		else if(strlen($password)>13){
			$error="Password must be less than 13 characters";
		}
		else if($password!==$passwordconfirm){
			$error="Password does not match";
		}
		
		else if(!$conditon)
		{
				$error="You must be agree to the T&C";
		}
		
		else{
				$password=md5($password);
				$passwordconfirm=md5($passwordconfirm);
				$insertquery="INSERT INTO users(firstname,lastname,email,password,repassword) VALUES ('$firstname','$lastname','$email','$password','$passwordconfirm')";
				if(mysqli_query($con,$insertquery)==TRUE){
					$success="You are registered Successfully";
				}
			}	
		
			
	}
	
		
		



?>

<!DOCTYPE html>
<html>


	<head> <title> Sign Up </title> 
		
		<link rel="stylesheet" href="styles.css"/>
		
	</head>
	<body>
		
		<div id="wrapper"> 

				<div id="formDiv">
				
					<form method="POST" action="signup.php" enctype="multipart/form-data">
							
						<label> First Name </label></br>
						<input type="text" name="fname"/></br></br> 
						
						<label> Last Name </label></br>
						<input type="text" name="lname" /> </br></br>
						
						<label> Email </label></br>
						<input type="text" name="email" /> </br></br>
						
						<label>Password </label></br>
						<input type="password" name="password"/> </br></br>
						
						<label> Re-enter Password </label></br>
						<input type="password" name="passwordConfirm"/> </br></br>
						
						<input type="checkbox" name="terms"/> 
						<label> I agree with terms and conditions </label><br/><br/>
						
						
						<input type="submit" name="SignUp" value="SignUp"/> </br></br>					
					</form>
					
				<div id="error">
					<?php 
							if($error==True){
								echo "Error: ".$error;
							}
							if($success==True){
								echo "Congrats, ".$success;
							}
					?>
					
				</div>
				
			</div>
			<div id="menu">
				<a href="login.php"> Login </a>
			</div>
		</div>
	</body>
</html>