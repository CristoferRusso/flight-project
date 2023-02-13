<?php
session_start();
require 'header.php';
?>
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
<link href="style/style1.css" rel="stylesheet">

<div style="background-color:blueviolet; width: 100%;  height:1000px " >
<main class="m-auto" >
 <div class="container" >


 <?php
    if (!empty($_SESSION['errors'])) {  ?>

      <div class="alert alert-danger" style=" width: 100%; padding:30px; "> <?= $_SESSION['errors'] ?></div>

    <?php $_SESSION['errors'] = '';
    } ?>


  <section class="ftco-section" style="width: auto;">
   
      <div class="row justify-content-center">
        <div class="col-md-16">
          <div class="row no-gutters">
            <div class="col-md-16">
              <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">

              <form class='form' method="POST" action="update.php">
                  <h3>Update</h3>
                  <div class="form-floating">
                    <input type="email" class="form-control" name="new_email" id="new_email" placeholder="New email">
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control" name="new_name" id="new_email" placeholder="New name">
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control" name="new_last_name" id="new_email" placeholder="New last name">
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit" style="margin-top: 10px;">Update</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  </div>
  <?php

require 'footer.php'
?>

</main>
















