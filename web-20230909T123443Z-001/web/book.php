<?php 
session_start(); 
if(!isset($_SESSION['id'])){
	header('location:index.php');
}

include('config.php');
                            $id = $_SESSION['session'];
							$distance=$_SESSION['dist'];
                            $sel = "select * from pet_reg where user_id='$id' ";
                            $val = mysqli_query($con, $sel);
// if(isset($_POST['petreg'])){
// 	header('location:welcome.php');
// }
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
<form method="post">
	


<strong>Pet Registration</strong></br>
	 <?php $selectbox = '<select name="pet" id=\'pet_id\'>';
                            while ($row = mysqli_fetch_array($val)) {
                                $selectbox .= '<option value=\"' . $row['pet_name'] . '\">' . $row['pet_name'] . '</option>';
                            }
                            $selectbox .= '</select>';
                            echo $selectbox;?> <br>
	Service: <br><input type="radio" name="service" value="walking" >walking <br>	
		  <input type="radio" name="service" value="feeding" >Feeding <br><input type="radio" name="service" value="socialization" >Socialization <br>
		    <input type="radio" name="service" value="playsession" >playsession<br> <br>
		Day <select name="day">
				<option>sunday</option>
				<option>monday</option>
				<option>tuesday</option>
				<option>wednesday</option>
				<option>thursday</option>
				<option>friday</option>
				<option>saturday</option>

			</select> <br> <br>
		Session <input type="number" name="session"> <br> <br>
<p><input type="submit" name="petreg" value="Book"  required="required"/></p>
<strong>REGISTER ANOTHER PET:</strong><a href="register_pet.php"> Register</a>
<?php

$sum=0;

if(isset($_POST['petreg'])){
	$name=$_POST['pet'];
	$service=$_POST['service'];

	
  if($service=='walking'){
              $service_charge=1;
            } else if($service=='feeding'){
              $service_charge=3;
            } else if($service=='socialization'){
              $service_charge=1;
            }elseif($service=='playsession'){
              $service_charge=1.5;
            }
					
	
// $date = $_POST['date'];
$day = $_POST['day'];
// $time = $_POST['time'];
$session = $_POST['session'];
$cost=$session*$service_charge;
	
	$sql="insert into pets values('','$id','$name','$service','$day','$session','$cost')";
	mysqli_query($con,$sql);
	
}
?>
<?php

$sql="select sum(cost) from pets where user_id=$id";
$result=mysqli_query($con,$sql);
while($rows=mysqli_fetch_array($result)){
$sum=$rows[0];
}
?>  
<?php
$cost_distance=0;
$total=0;
$sql1="select distance from users where user_id=$id";
$result1=mysqli_query($con,$sql1);
while($rows1=mysqli_fetch_array($result1)){
$distance=$rows1['distance'];
}
if ($distance>10){
$add_distance=$distance-10;
$cost_distance=$add_distance * 0.5;
$total=$cost_distance+$sum;

}else{
$total=$sum;
}

?>

</form>

</div >
<div class = "sum">
<strong>
<?php
echo "totalcost:" .$total."<br>"."<br>";
echo "Service charge:".$sum."<br>";

?>
</strong></div>



	<div class = "data">
	Sunday<br>
	<table border="1">
		<tr>
			<td>Dog name</td>
			<td>Service</td>
			<td>Day</td>
			
			<td>session</td>
			<td>cost</td>
			<td>Update</td> <td>Delete</td>
			
			
		</tr>
		<?php
			$query="select * from pets where user_id=$id and day='sunday'";
			$sql=mysqli_query($con,$query);
			while($data=mysqli_fetch_array($sql)){
		?>
		
		<tr>
			<td><?php echo $data['pet_name'];?></td>
			<td><?php echo $data['service'];?></td>
			<td><?php echo $data['day'];?></td>
			<td><?php echo $data['session'];?></td>
			<td><?php echo $data['cost'];?></td>
			<td><a href="update.php?editbookid=<?php echo $data['pet_id'] ?>" > Update</a> </td>
			<td><a href="delete.php?deleted">Delete</a></td>



		</tr>
		<?php
		}
		?>
	</table>
		monday<br>
	<table border="1">
		<tr>
			<td>Dog name</td>
			<td>Service</td>
			<td>Day</td>
			
			<td>session</td>
			<td>cost</td>
			<td>Update</td> <td>Delete</td>
			
		</tr>
		<?php
			$query="select * from pets where user_id=$id and day='monday'";
			$sql=mysqli_query($con,$query);
			while($data=mysqli_fetch_array($sql)){
		?>
	
		<tr>
			<td><?php echo $data['pet_name'];?></td>
			<td><?php echo $data['service'];?></td>
			<td><?php echo $data['day'];?></td>
			
			<td><?php echo $data['session'];?></td>
			<td><?php echo $data['cost'];?></td>
			<td><a href="update.php?editbookid=<?php echo $data['pet_id'] ?>">Update</a></td>
			<td><a href="delete.php?deleted">Delete</a></td>

		</tr>
		<?php
		}
		?>
	</table>
		tuesday<br>
	<table border="1">
		<tr>
			<td>Dog name</td>
			<td>Service</td>
			<td>Day</td>
			
			<td>session</td>
			<td>cost</td>
			<td>Update</td> <td>Delete</td>
			
			
		</tr>
		<?php
			$query="select * from pets where user_id=$id and day='tuesday'";
			$sql=mysqli_query($con,$query);
			while($data=mysqli_fetch_array($sql)){
		?>
		
		<tr>
			<td><?php echo $data['pet_name'];?></td>
			<td><?php echo $data['service'];?></td>
			<td><?php echo $data['day'];?></td>
			
			<td><?php echo $data['session'];?></td>
			<td><?php echo $data['cost'];?></td>
			<td><a href="update.php?editbookid=<?php echo $data['pet_id'] ?>">update</a></td>
			<td><a href="delete.php?deleted">Delete</a></td>

		</tr>
		<?php
		}
		?>
	</table>
		wednesday<br>
	<table border="1">
		<tr>
			<td>Dog name</td>
			<td>Service</td>
			<td>Day</td>
			
			<td>session</td>
			<td>cost</td>
			<td>Update</td> <td>Delete</td>
			
		</tr>
		<?php
			$query="select * from pets where user_id=$id and day='wednesday'";
			$sql=mysqli_query($con,$query);
			while($data=mysqli_fetch_array($sql)){
		?>

		<tr>
			<td><?php echo $data['pet_name'];?></td>
			<td><?php echo $data['service'];?></td>
			<td><?php echo $data['day'];?></td>
			
			<td><?php echo $data['session'];?></td>
			<td><?php echo $data['cost'];?></td>
			<td><a href="update.php?editbookid=<?php echo $data['pet_id'] ?>">Update</a></td>
			<td><a href="delete.php?deleted">Delete</a></td>

		</tr>
		<?php
		}
		?>
	</table>
		thursday<br>
	<table border="1">
		<tr>
			<td>Dog name</td>
			<td>Service</td>
			<td>Day</td>
			
			<td>session</td>
			<td>cost</td>
			<td>Update</td> <td>Delete</td>
			
		</tr>
		<?php
			$query="select * from pets where user_id=$id and day='thursday'";
			$sql=mysqli_query($con,$query);
			while($data=mysqli_fetch_array($sql)){
		?>
		
		<tr>
			<td><?php echo $data['pet_name'];?></td>
			<td><?php echo $data['service'];?></td>
			<td><?php echo $data['day'];?></td>
		
			<td><?php echo $data['session'];?></td>
			<td><?php echo $data['cost'];?></td>
			<td><a href="update.php?editbookid=<?php echo $data['id'] ?>">update</a></td>
			<td><a href="delete.php?deleted">Delete</a></td>

		</tr>
		<?php
		}
		?>
	</table>
		friday<br>
	<table border="1">
		<tr>
			<td>Dog name</td>
			<td>Service</td>
			<td>Day</td>
			
			<td>session</td>
			<td>cost</td>
			<td>Update</td> <td>Delete</td>
			
			
		</tr>
		<?php
			$query="select * from pets where user_id=$id and day='friday'";
			$sql=mysqli_query($con,$query);
			while($data=mysqli_fetch_array($sql)){
		?>

		<tr>
			<td><?php echo $data['pet_name'];?></td>
			<td><?php echo $data['service'];?></td>
			<td><?php echo $data['day'];?></td>
			
			<td><?php echo $data['session'];?></td>
			<td><?php echo $data['cost'];?></td>
			<td><a href="update.php?editbookid=<?php echo $data['pet_id'] ?>">update</a></td>
			<td><a href="delete.php?deleted">Delete</a></td>

		</tr>
		<?php
		}
		?>
	</table>
		saturday<br>
	<table border="1">
		<tr>
			<td>Dog name</td>
			<td>Service</td>
			<td>Day</td>
			
			<td>session</td>
			<td>cost</td>
			<td>Update</td> <td>Delete</td>
			
			
		</tr>
		<?php
			$query="select * from pets where user_id=$id and day='saturday'";
			$sql=mysqli_query($con,$query);
			while($data=mysqli_fetch_array($sql)){
		?>

		<tr>
			<td><?php echo $data['pet_name'];?></td>
			<td><?php echo $data['service'];?></td>
			<td><?php echo $data['day'];?></td>
	
			<td><?php echo $data['session'];?></td>
			<td><?php echo $data['cost'];?></td>
			<td><a href="update.php?editbookid=<?php echo $data['pet_id'] ?>">update</a></td>
			<td><a href="delete.php?deleted">Delete</a></td>

		</tr>
		<?php
		}
		?>
	</div>
	</table>
	</div>

		<div id = "footer">Shashank <br>
	Copyright @2016 <br>
	<strong>Contact E-mail:</strong> <br>
	lucypet@services.com
	</div>
	
	</body>
	</html>