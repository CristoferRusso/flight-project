<?php
require 'db.php';
require 'functions.php';

session_start();

$email = $_POST['email'];
$errors = '';
if (empty($_POST['email'])) {
    $errors .= 'Email is required <br>';
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors .= 'Invalid email <br>';
}
if (empty($_POST['password'])) {
    $errors .= 'Password is required<br>';
}


$sql = "SELECT email,password FROM users WHERE email =?";
$stm = $link->prepare($sql);
$stm->bind_param('s', ($_POST['email']));
$res = $stm->execute();
$result = $stm->get_result();



if ($res && $result->num_rows) {

    $row = $result->fetch_assoc();


    if (password_verify($_POST['password'], $row['password'])) {
        $_SESSION['messageLogin'] = 'You are logged in ';
        header('Location: login.php');
        $_SESSION['user_email'] = $email;
    } else {

        $_SESSION['errors'] = 'Wrong email or password';
        header('Location: login.php');
        die();
    }
} else {
    $errors .= 'This email does not exist';
}

if (!empty($errors)) {

    $_SESSION['errors'] = $errors;
    header('Location: login.php');
    die();
}
