<?php
    session_start();
    
    if (isset($_SESSION['logat'])){
        echo 'secret';
    } else {
        echo 'acces interzis';
    }
?>