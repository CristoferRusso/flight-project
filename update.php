<?php

require 'db.php';
require 'functions.php';
session_start();

$sql = "UPDATE `users` SET `name` ='".$_POST['new_name']."', `surname` = '".$_POST['new_last_name']."', `email` = '".$_POST['new_email']."' WHERE `users`.`id` = '".$_SESSION['user_id']."'";
$stm = $link->prepare($sql);
$res = $stm->execute();
if ($res && $stm->affected_rows) {
 
    $stm->close();
}

if($res) {
    $_SESSION['user_email'] = $_POST['new_email'];
    $_SESSION['name'] = $_POST['new_name'];
    $_SESSION['surname'] = $_POST['new_last_name'];
    header('Location: option.php');

} else {
    $_SESSION['errors'] = 'errors';
    header('Location: newEmail.php');

}

$stm->close();