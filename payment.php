<?php
if(isset($_POST['firstname'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$amount = $_POST['amount'];
    $pay = $_POST['pay'];
    $cardnum = $_POST['cardnum'];
    $cvv = $_POST['cvv'];	
}
	// Database connection
	$conn = new mysqli('localhost','root','','authentication');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into payment(firstname, lastname, email, amount, pay, cardnum, cvv) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssii", $firstname, $lastname, $email, $amount, $pay, $cardnum, $cvv);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>








