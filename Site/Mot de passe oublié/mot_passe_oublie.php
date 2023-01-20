<?php

require "debut.html";

require_once ('../Model/Model.php');
$m = Model::getModel();

session_start();

//initialisation de variables d'erreurs 
//on leur donne une valeur nulle par défaut, si le champ est vide alors un msg d'erreur s'affichera
$mailErr = "";

if(isset($_POST['oublie'])){

    if(empty($_POST['email'])){
        $mailErr = "<br>Le champ Email est vide.";
    } 
    
    }

require "fin.php";
?>