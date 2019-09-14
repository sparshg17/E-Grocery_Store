<?php
	
	session_start();
	include("functions.php");
	$con=mysqli_connect("localhost","root","","signup");
	if(mysqli_connect_errno()){
		echo"Error caught while connecting with database".mysqli_connect_errno();
	}
	
	if(logged_in()==true)
	{
		
	?>	<a href="logout.php" style="float:right; padding:7px; margin-right:30px; opacity:30%; background-color:#eee; color:#333; text-decoration:none;">Logout</a>
		<a href="change.php" style="float:right; padding:7px; margin-right:50px; opacity:30%; background-color:#eee; color:#333; text-decoration:none;">Change Password</a>
		
		
		
	<?php	
	}
	else
	{
		header("location:login.php");
	}
	
?>
		
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Page</title>
    <link rel="stylesheet" href="stylesv.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="logo"><a href="groclogo.jpg">Artisan Backery Logo</a></li>
            </ul>
        </nav>
    </header>
    <section class="features">
        <figure>
            <a href="bread.php">
            <img src="sqbread.jpg" alt="bread"/>
            </a>
            <figcaption>Bread</figcaption>
        </figure>
        <figure>
            <a href="milk.php">
            <img src="milk.jpg" alt="milk"/>
            </a>
            <figcaption>Milk</figcaption>
        </figure>
        <figure>
            <a href="eggs.php">
            <img src="eggs.jpg" alt="egg">
            </a>
            <figcaption>Eggs</figcaption>
        </figure>
    </section>
    <footer>
        <div>
            <h3>Address</h3>
            <h5>Darbhe Junction<br>Near Prashant Hotel<br>Puttur, D.K</h5>
        </div>
        <div>
            <h3>Contact</h3>
            <h5>
                +91 9923947534<br>
                +91 9834726529
            </h5>
        </div>
        <div>
            <h3>About Us</h3>
            <h5>
                Delivering fresh grocery items since 1978. Founded and brought up by Lt.Vasudev Adiga, this is now one of the best selling grocery store in Karnataka.
            </h5>
        </div>
    </footer>
</body>
</html>