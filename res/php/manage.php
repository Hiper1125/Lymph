<?php

function getPatientById($con, $id)
{
    $name = null;
    $surname = null;
    $attività_id = null;
    $data = null;
    $punteggio = null;

    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    $stmt = $con->prepare('SELECT `Nome`, `Cognome` FROM `Pazienti` WHERE `Id` = ?');

    // Bind parameters
    $stmt->bind_param('i', $id);
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    // Check if there is data fot the patient to get:
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name, $surname);
        $stmt->fetch();
        $stmt->close();

        $patient = array('Id' => $id, 'Name' => $name, 'Surname' => $surname);

        $_SESSION['PatientData'] = $patient;

        $stmt = $con->prepare("SELECT `AttivitàId`, `DataCompletamento`, SUM(`Punteggio`) AS `PunteggioOttenuto` FROM `Esercizi` INNER JOIN `Attività`  ON `Esercizi`.`AttivitàId` = `Attività`.`Id` INNER JOIN `Game Accounts` ON `Attività`.`GameAccountId` = `Game Accounts`.`Id` WHERE `Attività`.`Stato` = 'Finito' AND `PazienteId` = ? GROUP BY `AttivitàId`");

        // Bind parameters
        $stmt->bind_param('i', $id);
        $stmt->execute();

        // Store the result
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($attività_id, $data, $punteggio);

            $scores = array();

            if ($stmt->num_rows == 1) {
                $stmt->fetch();
                $score = array('Date' => $data, 'Score' => $punteggio);
                array_push($scores, $score);
            } else {
                while ($stmt->fetch()) {
                    $score = array('Date' => $data, 'Score' => $punteggio);
                    array_push($scores, $score);
                }
            }

            $stmt->close();

            $_SESSION['PatientScores'] = $scores;
        }
    }
    else
    {
        $_SESSION['PatientScores'] = null;
    }
}
