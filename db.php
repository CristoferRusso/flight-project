
<?php

$link = mysqli_connect('localhost','root','06051994Numenor.','volaconte');
if(!mysqli_connect('localhost','root','06051994Numenor.','volaconte')) {
    echo 'ERROR: '.mysqli_connect_error();
}

function dbConnect()
{
    $dsn = 'mysql:dbname=volaconte;host=localhost';
    $user = 'root';
    $password = '06051994Numenor.';

    $dbh = new PDO($dsn, $user, $password);

    return $dbh;
}
