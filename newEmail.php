<?php
session_start();
require 'header.php';

?>
<?php
if (!empty($_SESSION['errors'])) {  ?>

<div class="alert alert-danger" style=" width: 100%; padding:30px; "> <?= $_SESSION['errors'] ?></div>

<?php $_SESSION['errors']=''; } ?>

<form action="update.php" method="POST">
<div class="card border-primary mb-3" style="margin:auto; width: 500px; margin-top: 200px">
  <div class="card-header">Header</div>
  <div class="card-body text-primary">
    <h5 class="card-title">Insert the new  email</h5>
    <input type="email" name="new_email" id="new_email"   placeholder="New email">
    <button class="btn btn-primary" type="submit" id="btndelete">Register new email</button>
  </div>
</div>
</form>