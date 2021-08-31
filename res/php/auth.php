<?php
include 'main.php';

// CSRF Protection
if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['Token']) {
	exit('Something went wrong!');
}

// Check if the data from the login form was submitted
if (!isset($_POST['email'], $_POST['password'])) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

$email = $_POST['email'];

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
$stmt = $con->prepare('SELECT `Id`, `Nome`, `Cognome`, `Password` FROM `Dottori` WHERE `Mail` = ?');

// Bind parameters
$stmt->bind_param('s', $email);
$stmt->execute();

// Store the result
$stmt->store_result();

// Check if the doctor exists:
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $name, $surname, $doctor_pw);
	$stmt->fetch();
	$stmt->close();

	// Doctor exists, now we verify the password.
	if (md5($_POST['password']) == $doctor_pw) {
		// Verification success! Doctor has loggedin!

		// Create sessions
		session_regenerate_id();

		$_SESSION['Logged'] = TRUE;

		$doctor_data = array('Id' => $id, 'Name' => $name, 'Surname' => $surname, 'Email' => $email);

		$_SESSION['DoctorData'] = $doctor_data;

		echo 'Success';
	} else {
		// Incorrect password
		echo 'Incorrect email and/or password!';
	}
} else {
	// Incorrect email
	echo 'Incorrect email and/or password!';
}

?>