<?php

// $filepath=realpath(dirname(__FIle__));
// include_once $filepath."/Session.php";
include "Session.php";
// include "User.php";
Session::init();

// $user=new User();


if (isset($_GET['action']) && $_GET['action'] == "logout") {
    // $user->LogoutUser();
    Session::destroy();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevList</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
    <header>
        <h1><a href="index.php">DevList</a></h1>
        <nav>
            <p><a href="profiles.php">Profiles</a></p>

            <?php
            if (Session::get("login")) { ?>
                <p><a href="?action=logout">Logout</a></p>

            <?php } else { ?>

                <p><a href="login.php">Login</a></p>
                <p><a href="register.php">Register</a></p>
            <?php } ?>


        </nav>
    </header>