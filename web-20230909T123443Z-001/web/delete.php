<?php
include('config.php');
session_start();


$id = $_SESSION['session'];
 $sel = "select * from pets where user_id='$id' ";
                            $val = mysqli_query($con, $sel);
                            // $selectbox = '<select name="pet" id=\'booking_id\'>';
                            while ($row = mysqli_fetch_array($val)) {
                            //     $selectbox .= '<option value=\"' . $row['pet_name'] . '\">' . $row['pet_name'] . '</option>';
                            $_SESSION['pet']=$row['pet_id'];
                           
                            $s=$_SESSION['pet'];
                        }
$query = "DELETE from pets where pet_id = '$s'";

$result = mysqli_query($con,$query);
 header("location:book.php?msg=successfully deleted");

?>
