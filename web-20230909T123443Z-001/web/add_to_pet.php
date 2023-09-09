<?php
include ('config.php');
session_start();
$use_id = '';
$name = '';
$time = '';
$day = '';

if(isset($_POST['update']))
{


$i = $_POST['pet_id'];
$pn = $_POST['pet_name'];
$b = $_POST['pet_breed'];

$sql = "UPDATE pet_reg SET  pet_name='$pn', breed = '$b' WHERE pet_id = '$i'";

if($con->query($sql) === TRUE){
echo "Data updated seccussfully!";
header('location:welcome.php');
}else{
	echo "Error :" . $con->error;
	}
}

 //request the directions
