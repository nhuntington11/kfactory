<?php

require_once 'User.php';

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
} else {
    $user = $_SESSION['user'];
    $email = $user->username;
    $user_roles = $user->get_roles();

    $allowed = 0;
    foreach($user_roles as $urole) {
        foreach($page_roles as $prole) {
            if ($urole == $prole) {
                $allowed = 1;
            }
        }
    }

    if(!$allowed) {
        header('Location: not_allowed.php');
        exit();
    }
}

?>