<?php 
session_start(); 
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
include ('config.php');

$user_id ='';
$name = '';
$day = '';
$time = '';
$breed = '';

include "config.php";




if(isset($_GET['pet_id'])){


$user_id = $_GET['pet_id'];
$query = "Select * from pet_reg where pet_id='$user_id'";
$resultp = $con->query($query);
if($resultp->num_rows > 0){
	foreach($resultp as $valuep){
	$user_id = $valuep['pet_id'];
	$name = $valuep['pet_name'];
	$breed = $valuep['breed'];
}
}
}
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
			

			<div class= "list_pets">

<div id = "table">
	<table border="1" width="400">
	<tr>
	<th>User id</th>
	<th>Pet id</th>

	<th>Pet Name</th>
	
	<th>Breed</th>
	<th>Total</th>
	
	<th colspan="2">Action</th></tr>

<?php
// session_start();
$userid = $_SESSION['session'];
$sql = "Select * from users where user_id='$userid'";
$sql1= "Select * from pet_reg where user_id='$userid'";
$result =mysqli_query($con, $sql1);
while ($value = mysqli_fetch_array($result)){

echo"<tr>		<td>".$value['user_id']."</td>
				<td>".$value['pet_id']."</td>
				<td>".$value['pet_name']."</td>
              	<td>".$value['breed']."</td>

              <td>
<a href='welcome.php?pet_id=$value[pet_id]'>Select</a></td><td>
<a href='delete_pet.php?pet_id=$value[pet_id]'>Delete</a></td></tr>";
}
  // <a href='welcome.php?id=$value[pet_id]'>Select</a></td>
  // <td> <a href='delete_pet.php?id=$value[pet_id]'>Delete</a></td></tr>";

?>
</table>
</div>
				<div id = "update">

	<strong>Edit Your Pets</strong>
<form action = "add_to_pet.php" method="post">
Id : <br />
<input type="text" name="pet_id" value="<?php echo $user_id; ?>" placeholder = "Pet id" readonly="readonly" /><br /><br />
Pet Name : <br />
<input type="text" name="pet_name" value="<?php echo $name;?>" placeholder="Pet Name" required=""/><br /><br />
Pet Breed: <br> <input type="text" name = "pet_breed" value ="<?php echo $breed; ?>" placeholder= "Pet Breed" required = ""><br> <br>	

<input type="submit" name="update" value="Update" />
<input type="submit" name="delete" value="Delete" />
</form>
	</div>	
	<div ID = "update">
	<a href="book.php">Book a Session</a>
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
