
<!DOCTYPE html>
<html>
<head>
	<title>Lucy Pet Shop</title>
	<link rel="stylesheet" href="css/index.css" type = "text/css">
</head>
<script>
	function f1(){
		alert ("user already exists");
	}
</script>
<body>

<!-- Registration -->
<?PHP	

include"config.php";
session_start();
 
if(isset($_POST['register'])){
		$origin = 'Kathmandu'; //kathmandu
	$dest = $_POST['address']; // pokhara
 //request the directions
$routes=json_decode(file_get_contents("http://maps.googleapis.com/maps/api/directions/json?origin=$origin&destination=$dest&alternatives=true&sensor=false"))->routes;

  //sort the routes based on the distance
usort($routes,create_function('$a,$b','return intval($a->legs[0]->distance->value) - intval($b->legs[0]->distance->value);'));


$dis = $routes[0]->legs[0]->distance->value/1600;


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$submit = $_POST['register'];
$encpass = md5($password);

if(empty($username) || empty($password))
{
echo "Fill All the fields";
}
else{
	if($username == $_SESSION['id']){
		header('location:member.php?msg=User already exists');
	}
	elseif($password == $repassword){
		$sql = "INSERT INTO users VALUES ('','$firstname','$lastname','$dest','$dis', '$username','$password')";
		if($con->query($sql) === TRUE)
			{
		 // return ("Successfully registered");
			header('location:index.php?msg=successfully registered');
			}
		else
			{echo "Error :" . $con->error;}
		}
	}

}
?>

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
			<div id= "banner"><marquee scrollamount = "20"> <img src="img/run.gif" ></marquee>
			</div>
			<div id= "marquee">
			<marquee>Contact us at Lucypet@services.com or 9854879512</marquee></div>
			
			</div>
			<div id= "content_area">
		
	<!-- registration form -->
			<div id = "dog"> 
		<img src="img/dog.jpg" alt="">
	</div>
			<div id ="regFrm">Not a <strong>member??</strong><br>
							Get a membership now!
			<form action="" method= "POST">
				<div>
					<input type="text" name="firstname" placeholder="First Name" required="">
				</div>
				<div>
					<input type="text" name="lastname" placeholder="Last Name" required="">
				</div>
				<div>
					<input type="text" name="address" placeholder="Address" required="">
				</div>
				
				<div>
					<input type="text" name="username" placeholder="Username" required="">
				</div>
				<div>
					<input type="password" name="password" placeholder="Password" required="">
				</div>
				<div>
					<input type="password" name="repassword" placeholder="Re-type password" required="" >
				</div>
				<div>
					<input class = "btnSub" type="submit" name="register" value = "Register">
				</div>
				<div>
					<input class = "btnClear" type="reset" name="reset" value = "Clear">
				</div>
				</form>
			</div>
	
	 
	</div>
	<div id = "footer">Shashank <br>
	Copyright @2016 <br>
	<strong>Contact E-mail:</strong> <br>
	lucypet@services.com
	</div>
	</div>
	</body>
	</html>
			
		
