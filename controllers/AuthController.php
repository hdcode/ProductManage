<?php

require_once './Controller.php';

$action = $_GET['action'];

if ($action == 'login') {
    // Sur la page de connexion
    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = $userdb->readCompte($login, $password);

    if ($user != null) {
        $_SESSION['user'] = $user;
        if ($user->role == 'administrateur') {
            header('Location: ../views/dashboard.php');
        }else {
            header('Location: ../views/dashboard.php');
        }
    } else {
        header('Location: ../index.php');
    }

}

if ($action == 'logout') {
    session_start();
    $user = $_SESSION['user'];
    session_destroy();
    if ($user->role == 'administrateur') {
        header('Location: ../index.php');
    }else {
        header('Location: ../index.php');
    }

}

?>