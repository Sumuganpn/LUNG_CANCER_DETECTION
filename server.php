<?php include 'connection.php';?>

<?php
if(isset($_POST['submit'])) {
	$id = strip_tags($_POST['id']);
	$name = strip_tags($_POST['name']);
	$secondname = strip_tags($_POST['secondname']);
	$email = strip_tags($_POST['email']);
	$gender = strip_tags($_POST['gender']);


	$id = $connect->real_escape_string($id);
	$name = $connect->real_escape_string($name);
	$secondname = $connect->real_escape_string($secondname);
	$email = $connect->real_escape_string($email);
	$gender = $connect->real_escape_string($gender);

	
	
	$check_email = $connect->query("SELECT email FROM user_info WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO user_info(id, first_name, last_name, email, gender) VALUES('$id','$name','$secondname','$email','$gender')";

		if ($connect->query($query)) {

			echo "<div style='color:#ffffff;text-align:center; padding: 10px'> INFORMATION WAS SUBMITTED SUCCESSFULLY!</div>";

		}else {
			echo "<div style='color:red;text-align:center;padding: 7x'>Error occured while submitting your information. Please try again</div>".$connect->connect_errno;
		}
		
	} else {
		
		
		echo "<div style='color:red;text-align:center;padding: 7px'>Sorry email already taken!</div>";
			
	}


	$connect->close();
}
?>
