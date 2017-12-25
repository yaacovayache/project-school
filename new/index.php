<?php 
    require_once "tools/session.php";


    // affichage de la page login
    if(!isconnected()) {
        include "controller/loginController.php";
    }

    // affichage du dashboard
    else {
        include "controller/dashboardController.php";
    }
?>