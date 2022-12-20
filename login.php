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
<link href="style/loginStyle.css" rel="stylesheet">
<link href="style/style1.css" rel="stylesheet">





<main class="form-signin w-100 m-auto">
<img class='img-fluid'width="100%" height="100%" style="margin-bottom: 100px; border-radius: 10px" src="images//alexey-starki-91ykdj2WQeg-unsplash (1).jpg"></img>

<?php
        if (!empty($_SESSION['errors'])) {  ?>

          <div class="alert alert-danger" style=" width: 100%; padding:30px; "> <?= $_SESSION['errors'] ?></div>

        <?php
        
          $_SESSION['errors'] = '';
        } else if (isUserLoggedIn()) { ?>
          <div class="alert alert-success" style=" width: 100%; padding:30px;"> <?= $_SESSION['messageLogin'].$users->get_name() ?></div>
        <?php
          $_SESSION['errors'] = '';
        } ?>



    <form class='form' method="POST" action="login_logic.php">
        <h1 class="h3 mb-3 fw-normal">Please Login</h1>

        <div class="form-floating">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="form-floating">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        
      


        <button class="w-100 btn btn-lg btn-primary" type="submit"  style="margin-top: 10px;">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main>