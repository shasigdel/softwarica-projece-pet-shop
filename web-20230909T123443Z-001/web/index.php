
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
					<li><a href="index.php">Home</a></li>
					<li><a href="member.php">Members</a></li>
					<li><a href="help.php">Help</a></li>
					<li><a href="about.php">About</a></li>
				</ul>
			</div>
			
			<div id = "top_info">Lucy's Pet Services</div>
			</div>
				<div id= "banner"><marquee scrollamount = "20"> <img src="img/run.gif" ></marquee>
			</div>
			<div id= "marquee">
			<marquee>Contact us at Lucypet@services.com or 9854879512</marquee></div>
		
		<!-- CONTENTS -->
		<div id = "content">
			<div id = "left_col">LOGIN HERE
				<form action = "validate.php" method = "POST">
					<div id="uname"><input type="text" name="username" placeholder="Username" required=""></div>
					<div id = "pwd"><input type="password" name="password" placeholder="Password" required=""></div>
					<div id = "remember"><input type="checkbox" name="rememberme" value = "1"><label>Remember me</label></div>
					<div id = "login"><input class =" btn" name = "login" type="submit" value="LOGIN"></div>	
				<div id ="reg"><p>If not registered<a href="member.php">Register</a></p></div>			
				</form>
			
			</div>
	

			<div id = "right_col"><img src="img/giphy.gif">
			
			</div>
	</div>
	<!-- FOOTER -->
	<div id = "footer">Shashank <br>
	Copyright @2016 <br>
	<strong>Contact E-mail:</strong> <br>
	lucypet@services.com
	</div>
	</div>
	<!-- Container Ends -->
</body>
</html>