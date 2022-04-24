<?php

    declare(strict_types=1);

    if (isset($_POST['session_id'])) {
        session_id($_POST['session_id']);
    }

    require '../autoload.php';

    if (isset($_SESSION['userid'])) {
        echo json_encode(['error'=>true, 'errorInfo'=>'Gebruiker is al ingelogd']);
        die;
    }

    if (!isset($_POST['email']) || !isset($_POST['passw'])) {
        echo json_encode(['error'=>true, 'errorInfo'=>'No data']);
        die;
    }


    $statement = $pdo->prepare('SELECT id, email, role ,passw FROM users WHERE email = :email');
    $statement->bindParam(':email', $_POST['email']);

    if (!$statement->execute()) {
        echo json_encode(['error' => true, 'errorInfo'=>$pdo->errorInfo()]);
    }

    $data = $statement->fetch(PDO::FETCH_ASSOC);

    if ($data['role'] == "admin")
    {
        if (isset($data['passw'])) {
            if (password_verify($_POST['passw'], $data['passw'])) {
                $_SESSION['userid'] = $data['id'];
                $_SESSION['role'] = 'admin';
                echo json_encode('Logginin '.$_SESSION['userid']);
                die;
            }
            echo json_encode(['error'=>true, 'errorInfo'=>'Wachtwoord niet gevonden']);
            die;
        } else {
            echo json_encode(['error' => true, 'errorInfo'=>'Gebruiker niet gevonden']);
        }

    }
    else {
        if (isset($data['passw'])) {
            if (password_verify($_POST['passw'], $data['passw'])) {
                $_SESSION['userid'] = $data['id'];
                echo json_encode('Logginin '.$_SESSION['userid']);
                die;
            }
            echo json_encode(['error'=>true, 'errorInfo'=>'Wachtwoord niet gevonden']);
            die;
        } else {
            echo json_encode(['error' => true, 'errorInfo'=>'Gebruiker niet gevonden']);
        }
    }

