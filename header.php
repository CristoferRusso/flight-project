<?php 
require 'functions.php';
require 'users.php';
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>VolaConTe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <link rel="stylesheet" href="style/bootstrap.css">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style/carousel.css" rel="stylesheet">
    <link href="style/style1.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">



</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">VolaConTe</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <?php if (!isUserLoggedIn()) {  ?>
                            <div class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="register.php">Sign up</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="register.php">Info</a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="register.php">Info</a>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="option.php">Options</a>
                            </li>

                        <?php } ?>
                    </ul>

                    <?php if (isUserLoggedIn()) { ?>
                        <h6 style="margin-right: 10px;"><?php print_r($users->get_name()) ?><br><?php print_r($users->get_surname()) ?></h6>
                        <form class="d-flex" role="search" action="index.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="city" id="city">
                        <button  class="btn btn-lg btn-primary" type="submit">Search</button>
                        </form>

                    <?php }

                    ?>
                    
                </div>
            </div>
        </nav>
    </header>