<?php
        include_once "../database.php";
        ob_start();
        session_start();
        $_SESSION['name']=null;
        $_SESSION['email']=null;
        $_SESSION['role']=null;
        header('location:../index.php');
    
?>