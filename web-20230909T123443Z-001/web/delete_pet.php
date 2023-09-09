<?php
include('config.php');
session_start();


$id = $_SESSION['session'];
$query = "DELETE from pet_reg where user_id = '$id'";

$result = mysqli_query($con,$query);
 header("location:welcome.php?msg=successfully deleted");

?>
