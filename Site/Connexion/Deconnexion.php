<?php
session_start();
    $_SESSION['role']=0;
    header('Location: ../Accueil/accueil.php');
                        exit();
    
?>