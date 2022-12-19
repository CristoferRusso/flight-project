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
      <h5 class="card-header">Delete account</h5>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <button class="btn btn-primary" type="submit" id="btndelete">Delete</button>
      </div>
    </div>
</form>

<?php } ?>
