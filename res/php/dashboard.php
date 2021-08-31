<?php

if (!isset($_SESSION['minPat'], $_SESSION['maxPat'])) {
    $_SESSION['minPat'] = 0;
    $_SESSION['maxPat'] = 4;
}

$min = $_SESSION['minPat'];
$max = $_SESSION['maxPat'];

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
$stmt = $con->prepare('SELECT `Pazienti`.`Id` AS `Id Paziente`, `Nome`, `Cognome`, `Stato`, `Data` FROM `Pazienti` INNER JOIN `Game Accounts` ON `Pazienti`.`Id` = `Game Accounts`.`PazienteId`INNER JOIN `Prenotazioni` ON `Pazienti`.`Id` = `Prenotazioni`.`PazienteId` HAVING `Id Paziente` > ? AND `Id Paziente` < ?');

// Bind parameters
$stmt->bind_param('ii', $min, $max);
$stmt->execute();

// Store the result
$stmt->store_result();

// Check if there are patients to get:
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $name, $surname, $state, $date);

    $patients_data = array();

    if ($stmt->num_rows == 1) {
        $stmt->fetch();
        $patient = array('Id' => $id, 'Name' => $name, 'Surname' => $surname, 'State' => $state, 'Date' => $date);
        array_push($patients_data, $patient);
    } else {
        while ($stmt->fetch()) {
            $patient = array('Id' => $id, 'Name' => $name, 'Surname' => $surname, 'State' => $state, 'Date' => $date);
            array_push($patients_data, $patient);
        }
    }

    $stmt->close();

    $_SESSION['PatientsList'] = $patients_data;
}
