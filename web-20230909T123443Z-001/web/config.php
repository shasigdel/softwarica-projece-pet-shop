<?php
$mysql_server = "localhost";
$mysql_username = "root";
$mysql_pw = "";
$mysql_db = "lucy";

$con = new mysqli($mysql_server, $mysql_username, $mysql_pw, $mysql_db);

if($con->connect_error)
{
die("Connection Failed :" .$con->connect_error);
}

?>