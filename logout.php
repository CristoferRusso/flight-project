<?php

require 'functions.php';
session_start();

//Chiama la funzione logout(functions.php) che essegue il logout e reindirizza a login.php
logout();
header('Location: register.php');

