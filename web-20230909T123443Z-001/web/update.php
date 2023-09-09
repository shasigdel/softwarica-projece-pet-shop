<?php
include ('config.php');
session_start();
if(isset($_POST['update'])){
	$uid = $_SESSION['session'];
	
	$ser = $_POST['service'];
	$day = $_POST['day'];
	$session = $_POST['session'];
	 $sel = "select * from pets where user_id='$uid' ";
                            $val = mysqli_query($con, $sel);
                            // $selectbox = '<select name="pet" id=\'booking_id\'>';
                            while ($row = mysqli_fetch_array($val)) {
                            //     $selectbox .= '<option value=\"' . $row['pet_name'] . '\">' . $row['pet_name'] . '</option>';
                            $_SESSION['pet']=$row['pet_id'];
                           
                            $s=$_SESSION['pet'];
                            

}



$sql = "UPDATE pets SET service = '$ser', day = '$day', session = '$session' WHERE pet_id = '$s'";

if($con->query($sql) === TRUE){
header('location:book.php?msg=update successfull');
}else{
	echo "Error :" . $con->error;
	}
}



?>
 <?php 
 $uid = $_SESSION['session'];


 
                            // $selectbox .= '</select>';
                            ?> <br>
                            <form method = "POST">
	Service: <br><input type="radio" name="service" value="Pet_walking" >walking <br>	
		  <input type="radio" name="service" value="Pet_feeding" >Feeding <br><input type="radio" name="service" value="Socialization" >Socialization <br>
		    <input type="radio" name="service" value="Play_sessions" >playsession<br> <br>
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
<p><input type="submit" name="update" value="Update"  required="required"/></p>
</form>