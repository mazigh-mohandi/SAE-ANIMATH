<?php

require "debut_html.html";

require_once ('../Model/Model.php');
$m = Model::getModel();

session_start();

//initialisation de variables d'erreurs 
//on leur donne une valeur nulle par défaut, si le champ est vide alors un msg d'erreur s'affichera
$mailErr = ""; $mdpErr = "";

if(isset($_POST['connexion'])){

    if(empty($_POST['email'])){
        $mailErr = "<br>Le champ Email est vide.";
    } else {
        if(empty($_POST['mdp'])){
            $mdpErr = "<br>Le champ Mot de passe est vide.";


        } else {

            // les champs email & mdp sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
            $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8"); 
            $mdp = htmlentities($_POST['mdp'], ENT_QUOTES, "UTF-8");

        // PAS FINI A PARTIR DE LA 
        // MANQUE: MODEL

            $connexion = $m->connexion($email,$mdp) ;

            //on se connecte à la base de données:
            //$mysqli = mysqli_connect("domaine.tld", "nom d'utilisateur", "mot de passe", "base de données");
            //on vérifie que la connexion s'effectue correctement:
            //if(!$mysqli){
            //    echo "Erreur de connexion à la base de données.";
            //} else {
                //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                //si vous avez enregistré le mot de passe en md5() il vous faudra faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
            //    $Requete = mysqli_query($mysqli,"SELECT * FROM membres WHERE mail = '".$Email."' AND mdp = '".$MotDePasse."'");
                //si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                //si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
            //    if(mysqli_num_rows($Requete) == 0) {
            //CETTE LIGNE EST BONNE        $mailErr = "L'email ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
            //    } else {
            //        $_SESSION['email'] = $Email;
            //CETTE LIGNE EST BONNE        echo "Vous êtes à présent connecté! &nbsp; <a href='../Accueil/Accueil.html'>Retourner à l'accueil</a>";
            //}
            //}
        }
    }
}

require "fin_html.php";
?>