 
 
<?php
include
 'config.php';
if(isset($_POST['login']))
{
$acc = $_POST['username'];
$pass = $_POST['password'];

if(empty($acc) || empty($pass))
{echo "Enter data";}
else{

	// COOKIE
	if(isset($_POST['rememberme'])){

setcookie('username',$acc, time()+60*60*365);
}
	// SESSION
session_start();
$query = "SELECT * FROM users WHERE username='$acc' and 
        password='$pass'";
$result = $con->query($query);
if($result->num_rows == 1)
{
while($rows=$result->fetch_assoc())
{
	
$_SESSION['session'] = $rows['user_id'];
$_SESSION['session_id'] = $rows['user_fname'];
$_SESSION['id'] = $rows['username'];
$_SESSION['dist'] = $rows['distance'];
	
header('location:welcome.php');

}
}

else{
	
header('location:index.php?msg=incorrected username or password');

	echo "Password or username incorrect";}

}

}
?>