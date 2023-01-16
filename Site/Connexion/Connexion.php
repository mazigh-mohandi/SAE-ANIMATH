<?php

require "debut_html.html";

require_once ('../Model/Model.php');
$m = Model::getModel();

session_start();

//initialisation de variables d'erreurs 
//on leur donne une valeur nulle par défaut, si le champ est vide alors un msg d'erreur s'affichera
$mailErr = ""; $mdpErr = "";


if(isset($_POST['connexion']))
    {

    if(empty($_POST['emailConnexion']))
        {
        $mailErr = "<br>Le champ Email est vide.";
        } 
    elseif(empty($_POST['mdpConnexion']))
        {
                    $mdpErr = "<br>Le champ Mot de passe est vide.";
        } 
    else 
        {

                    // les champs email & mdp sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
                    $email = htmlentities($_POST['emailConnexion'], ENT_QUOTES, "UTF-8"); 
                    $mdp = htmlentities($_POST['mdpConnexion'], ENT_QUOTES, "UTF-8");

                    // PAS FINI A PARTIR DE LA 
                    // MANQUE: MODEL

                    $connexion = $m->connexion($email,$mdp) ;


        }
    }
    

require "fin_html.php";
?>