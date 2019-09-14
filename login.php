<?php
	session_start();
	include("functions.php");  #to be included in all pages
	
	$con=mysqli_connect("localhost","root","","signup");
	if(mysqli_connect_errno()){
		echo"Error occured while connecting with database".mysqli_connect_errno();
	}
	
	if(logged_in())
	{
		header("location:grocery.php");            #if user is logged in,will stay in grocerhy.php page only
		exit(); 								#exit here and will not execute any other condition further
	}
		
	
	$error="";
	
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$checkbox=isset($_POST['Keep']);
		
		if(email_exists($email,$con)==true){
			
				$result=mysqli_query($con,"SELECT password FROM users WHERE email='$email'");
				$retpass=mysqli_fetch_assoc($result);                  #returns associative array
				
				if(md5($password) !== $retpass['password'])            #match both password and fetched array
				{
					$error="Password is incorrect";
				}
				
				else
				{
					$_SESSION['email']=$email;  					#important for logging the user in as email if different for all
					
					if($checkbox=="on")
					{
						setcookie("email",$email,time()+3600);					#it has lot of more parameters also
					}
					
					header("location:grocery.php");			#user will be moved to grocery.php					
				}
		}
		else{
			$error="Email does not exists";
			}
		
	}	
		

?>






<html>
	<head><title>Login</title>
		
	<link rel="stylesheet" href="styless.css"/>	
		
	</head>
	<body>
		<div id="wrapperr" >
		
			<div id="formDivv">
			
				<form method="POST" action="login.php" enctype="multitype/form-data">
				
				<label> Email </label><br/>
				<input type="text" name="email"/><br/><br/>
				
				<label> Password </label><br/>
				<input type="password" name="password"/><br/><br/>
				
				<input type="checkbox" name="Keep"/>
				<label>Keep me logged in </label><br/></br>
				
				<input type="submit" name="submit" value="Login"/> <br/><br/>
				
				</form>
				
				<div id="error">
					<?php echo $error ?>
				</div>
			</div>
			<div id="menuu">
			
				<a href="signup.php"> Sign Up </a>
				
			</div>
		</div>	
	</body>
</html>	