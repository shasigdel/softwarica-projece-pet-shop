<?php 
session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
include ('config.php');

if(isset($_POST['ser'])){

	$walk = $_POST['walk'];
	
	$feed = $_POST['feed'];
	$social = $_POST['social'];
	$play = $_POST['play'];
	$uid = $_SESSION['session'];
	$pid = $_GET['pet_id'];
	 

$sql = "INSERT INTO booking VALUES ('', '$uid', '$pid', '$walk', '$feed', '$social', '$play') ";
	if($con->query($sql) === TRUE){
		header('location:welcome.php');
	}
	else{
		echo "Error:". $con->error;
	}

}
?>
