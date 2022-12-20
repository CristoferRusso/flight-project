<?php

require 'db.php';
require 'functions.php';
session_start();

$sql = "UPDATE `users` SET `email` = ?";
$sql .= " WHERE `users`.`email` =  ?";
$stm = $link->prepare($sql);
$stm->bind_param('ss',$_POST['new_email'], isUserLoggedIn());
$res = $stm->execute();
$result = $stm->get_result();

if($res) {
    $_SESSION['user_email'] = $_POST['new_email'];
    header('Location: option.php');

} else {
    $_SESSION['errors'] = 'errors';
    header('Location: newEmail.php');

}

$stm->close();