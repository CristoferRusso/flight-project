<?php



function isUserLoggedIn() {
    //Verifica che email sia presente nella session o nei cookie e se non c'è ritorna una stringa vuota, in questa maniera sappiamo se l'utente è loggato o no 
    return $_SESSION['user_email'] ?? '';
}




function logout () {
    session_destroy();
}

