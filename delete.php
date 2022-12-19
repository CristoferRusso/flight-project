<?php
require 'db.php';
require 'functions.php';
session_start();


$email = isUserLoggedIn();
$sql = "DELETE FROM `users` WHERE `users`.`email` = ?";
$stm = $link->prepare($sql);
$stm->bind_param('s',$email);
$res = $stm->execute();
$result = $stm->get_result();

if ($result == $stm->get_result()) {
    session_destroy();
    header('Location: option.php');
 
   
} else {
    $_SESSION['errors'] = 'Errors';
    header('Location: option.php');
 
}



