<?php

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
$stmt = $con->prepare('SELECT `Nome`, `Cognome` FROM `Dottori`');

// Store the result
$stmt->execute();
$stmt->store_result();

// Check if there are doctors to get:
if ($stmt->num_rows > 0) {
    $stmt->bind_result($name, $surname);

    $doctors = array();

    if ($stmt->num_rows == 1) {
        $stmt->fetch();
        $doctor = array('Name' => $name, 'Surname' => $surname);
        array_push($doctors, $doctor);
    } else {
        while ($stmt->fetch()) {
            $doctor = array('Name' => $name, 'Surname' => $surname);
            array_push($doctors, $doctor);
        }
    }

    $stmt->close();

    $_SESSION['Doctors'] = $doctors;
}