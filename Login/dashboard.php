<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location:index.php?error=credenziali");
    }
    echo $_SESSION['email'];
    session_destroy();
?>