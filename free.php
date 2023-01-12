<?php
if(isset($_POST['firstname'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];	
	$number=$_POST['number'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$city=$_POST['city'];
}
	// Database connection
	$conn = new mysqli('localhost','root','','authentication');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into trial(firstname, lastname, email, number, gender, age, city) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $firstname, $lastname, $email, $number, $gender, $age, $city);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>