<?php

session_start();
require 'db.php';

$errors = '';
$_SESSION['user_email'] = '';
if(empty($_POST['email'])) {

    $errors .= 'Email is required <br>';
    
} else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

    $errors .= 'Invalid email <br>';

}

if (empty($_POST['password'])) {

    $errors .='Password is required<br>' ;

}
if (strlen($_POST['password']) <6) {

    $errors .='The password must be at least 6 characters long' ;
}






//Controlla che l'email non è già presente nel server//
$sql = "SELECT email FROM users WHERE email =?";
//La funzione prepare la query nella variabile $stm
$stm = $link->prepare($sql);
//In questo modo stiamo dicendo che il parametro che andremo a mettere nella query(?) è di tipo stringa e che il valore che voglia far passare è email
$stm->bind_param('s',($_POST['email']));
//Esegue la query
$res = $stm->execute();
//Va a verificare che ci sono dati nella variabile $res e mostra la quantità di righe ritornate e inserisce il risultato nella variabile $result
$result = $stm->get_result();
//Verifica che i dati presenti in $result siano già presenti nel server e se ci sono restituisce un errore
if($res && $result->num_rows) {
    //Se ritorna qualcosa vuol dire che la email già esiste
    $errors .= 'Email alredy exist';
}
$stm->close();

if(!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: register.php');
   die();
    
} 


//REGISTRAZIONE utente//

$sql = "INSERT INTO users (email,password,name,surname) VALUES(?,?,?,?)";
$stm = $link->prepare($sql);

//Codifica la password inserita dall'utente
$passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stm->bind_param('ssss', $_POST['email'], $passHash, $_POST['name'], $_POST['surname']);

$res = $stm->execute();

if($res && $stm->affected_rows) {
    header('Location: index.php');
    $_SESSION['messageRegistration'] = '<br> You can now access your platform <br>' ;
    $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['message'] = 'You are logged in with';
} 
    //VERIFICA UTENTE LOGGATO//
    //Verifica che l'utente è loggato controllando se l'email è stata inserita in sessione
    $_SESSION['user_email'] =  $_POST['email'] ;
    header('Location: register.php');
    
   
    


