
<?php 
session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
include ('config.php');
if(isset($_POST['petreg'])){

	$name = $_POST['petname'];
	
	$breed = $_POST['breed'];

	$uid = $_SESSION['session'];

$sql = "INSERT INTO pet_reg values('','$uid','$name','$breed')";
	if($con->query($sql) === TRUE){
		header('location:book.php?msg=successfully registered');
	}
	else{
		echo "Error:". $con->error;
	}

}


