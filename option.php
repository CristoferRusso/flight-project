<?php

session_start();
require 'header.php';


?>

<form action="delete.php" method="POST">
  <?php
  
  if (!empty($_SESSION['errors'])) {  ?>
    <div class="alert alert-danger" style=" width: 100%; padding:30px; "> <?= $_SESSION['errors'] ?></div>
  <?php
    $_SESSION['errors'] = '';
  }  ?> 
  <?php 
  if (isUserLoggedIn()) { ?>
    <div class="card">
      <h5 class="card-header">Your account</h5>
      <div class="card-body">
        <h5 class="card-title"><?php  print_r($users->get_name()) ?><br><?php print_r($users->get_surname()) ?></h5>
        <p class="card-text"><?php print_r($users->get_email()) ?></p>
        <button class="btn btn-primary" type="submit" id="btndelete">Delete</button>
        <a class="btn btn-primary" type="submit" id="btndelete" href="newEmail.php">Change your email</a>
      </div>
    </div>
</form>

<?php } ?>
