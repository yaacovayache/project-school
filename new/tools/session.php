<?php
    session_start();

    // verifie si le mec est connecte
    function isconnected(){
        return isset($_SESSION['connected']) && $_SESSION['connected'];
    }
?>