<?php 
session_start(); 
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
include ('config.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lucy Pet Shop</title>
	<link rel="stylesheet" href="css/index.css" type = "text/css">
</head>
<body>

<!-- CONTAINER -->
	<div id = "container">
	<!-- HEADER -->
		<div id = "header">
			<div id ="logo">
			<img src="img/logo.png" href = "index.php">
			</div>
			
			<div id = "navbar">
				<ul>
					<li><a href = "welcome.php"><?php  echo "Welcome " . $_SESSION['session_id']; ?></a></li>
					<li><a href="register_pet.php">Register Pets</a></li>
					
					<li><a onclick="return confirm('Are you sure??')" href="logout.php">Logout</a></li>
				
				</ul>
			</div>
			
			<div id = "top_info">Lucy's Pet Services</div>
			</div>
				<div id= "banner"><marquee scrollamount = "20"> <img src="img/run.gif" ></marquee>
			</div>
			<div id= "marquee">
			<marquee>Contact us at Lucypet@services.com or 9854879512</marquee></div>
				

<div id = "pet_reg">		
<form action="reg.php" method="post">
	


<strong>Pet Registration</strong></br>
Pet Name <input type="text" name="petname" required="required" class="custom-textbox" placeholder="Your Pet Name" /></br>
Pet Age <input type="text" name="petage" required="required" class="custom-textbox" placeholder="e.g: 1 year" />
<p>Breed <br><input type="text" name="breed"  required="required" class="custom-textbox" placeholder="Breed" /></p>
<p><input type="submit" name="petreg" value="Register"  required="required"/>
<input type="reset" name = "clear" value = "Clear"></p>




</form>

</div>

		<div id = "footer">Shashank <br>
	Copyright @2016 <br>
	<strong>Contact E-mail:</strong> <br>
	lucypet@services.com
	</div>
	</div>
	</body>
	</html>
