<?php

require "debut_html.html";

require_once ('../Model/Model.php');
$m = Model::getModel();

session_start();


if(isset($_POST['connexion'])){

    // on vérifie que le champ "email" n'est pas vide
    if(empty($_POST['email'])){
        echo "Le champ Email est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mdp'])){
            echo "Le champ Mot de passe est vide.";

            
        } else {

            // les champs email & mdp sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
            $Email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8"); 
            $MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES, "UTF-8");
            //on se connecte à la base de données:
            $mysqli = mysqli_connect("domaine.tld", "nom d'utilisateur", "mot de passe", "base de données");
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                //si vous avez enregistré le mot de passe en md5() il vous faudra faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                $Requete = mysqli_query($mysqli,"SELECT * FROM membres WHERE mail = '".$Email."' AND mdp = '".$MotDePasse."'");
                //si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                //si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le email ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    //on ouvre la session avec $_SESSION:
                    //la session peut être appelée différemment et son contenu aussi peut être autre chose que le email
                    $_SESSION['email'] = $Email;
                    echo "Vous êtes à présent connecté !";
                }
            }
        }
    }
}

require "fin_html.php";
?>