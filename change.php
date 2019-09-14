<?php
	
	session_start();
	include("functions.php");
	$con=mysqli_connect("localhost","root","","signup");
	if(mysqli_connect_errno()){
		echo"Error occured while connecting with database".mysqli_connect_errno();
	}
	
	$error=" ";
	
	if(isset($_POST['submit']))
	{
		$password=$_POST['password'];
		$confirmPass=$_POST['passwordConfirm'];
		
			if(strlen($password)<8)
			{
				$error="Password must be greator than 8";
			}
			
			else if($password !== $confirmPass){
				$error="Password does not match";
			}
			
			else{
				$password=md5($password);
				$email=$_SESSION['email'];
				if(mysqli_query($con,"UPDATE users SET password='$password' WHERE email='$email'"))
				{
					echo"Password has been changed, <a href='login.php'>Click here </a> to go to Login Page";
				}
				
			}
	}
	
	if(logged_in())
	{
	?>
				<?php echo $error ?>
				<form method="POST" action="change.php"/>
						<label> New Password </label><br/>
						<input type="password" name="password"/> </br></br>
						
						<label> Re-enter Password </label><br/>
						<input type="password" name="passwordConfirm"/> </br></br>
						
						<input type="submit" name="submit" value="SavePassword"/><br/>
				</form>
	
	

<?php	
	}
	else{
		header("location:login.php");
	}

?>	
	