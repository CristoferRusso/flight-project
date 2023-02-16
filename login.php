<?php
session_start();
require 'db.php';
require 'header.php';


?>


<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
<link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">




<body>

  <div style="background-color:blueviolet; width: 100%;  height:1000px ">

    <main class="m-auto" style="background-color:blueviolet; width: 100%;  height:100% ">

      <?php
      if (!empty($_SESSION['errors'])) {  ?>

        <div class="alert alert-danger" style=" width: 100%; padding:30px; "> <?= $_SESSION['errors'] ?></div>

      <?php

        $_SESSION['errors'] = '';
      } else if (isUserLoggedIn()) { ?>
        <div class="alert alert-success" style=" width: 100%; padding:30px;"> <?= $_SESSION['messageLogin'] . $users->get_name() ?></div>
      <?php
        $_SESSION['errors'] = '';
      } ?>




      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-16">
              <div class="row no-gutters">
                <div class="col-md-16">
                  <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">
                    <form class='form' method="POST" action="login_logic.php">
                      <img src="images/paper-plane.png" alt="" width="50px" height="50px" style="float: right;">
                      <h1 style=" float: right; font-family:Arial, Helvetica, sans-serif;   background: -webkit-linear-gradient(rgb(255, 99, 255), blue);   -webkit-background-clip: text;   -webkit-text-fill-color: transparent; ">VolaConTe</h1>
                      <h3 class="h3 mb-3 fw-normal">Please Login</h3>
                      <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                      </div>
                      <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="color: black;">
                      </div>
                      <button class="w-100 btn btn-lg btn-primary" type="submit" style="margin-top: 10px;">Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  </section>

  <?php

  require 'footer.php'
  ?>

  </main>

</body>