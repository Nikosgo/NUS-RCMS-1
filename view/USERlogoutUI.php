<?php
    function displayLoginUI(){
        session_start();
        session_destroy();
        header('Location: USERloginUI.php');
    }
    
    displayLoginUI();
?>