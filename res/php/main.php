<?php
include_once 'config.php';

//Session start
session_start();

// Connect to the MySQL database using MySQLi
$con = mysqli_connect(db_host, db_user, db_pass, db_name);

if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Update the charset
mysqli_set_charset($con, db_charset);

// Check if user can see the current page
function check_loggedin($redirect_file = 'index.php')
{
	if (!isset($_SESSION['Logged'])) {
		// If the user is not logged in redirect to the login page.
		header('Location: ' . $redirect_file);
		exit;
	}
}

?>