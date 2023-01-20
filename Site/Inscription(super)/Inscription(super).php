<?php
  require "debut_html.html";
?>
<?php  
require_once ('../Model/Model.php');
$m = Model::getModel();


//par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
$AfficherFormulaire=1;

//initialisation de variables d'erreurs 
//on leur donne une valeur nulle par défaut, si le champ est vide alors un msg d'erreur s'affichera
$nomErr = ""; $prenomErr = "";
$mailErr = ""; $mdpErr = ""; $mdp2Err = ""; $cguErr = "";


//traitement du formulaire:
if(isset($_POST['Nom'],$_POST['Prenom'],$_POST['email'],$_POST['mdp'],$_POST['mdp2'],))
    {

    if(empty($_POST['Nom']))
        {
            $nomErr = 'Le champ "Nom" est vide';
        } 
    
    elseif(empty($_POST['Prenom']))
        {
            $prenomErr = 'Le champ "Prénom" est vide.';
        } 

    elseif(empty($_POST['email']))
        {
            $mailErr = 'Le champ "Adresse mail" est vide ';
        }
    elseif(empty($_POST['mdp']))
        {
            $mdpErr = 'Le champ "Mot de Passe" est vide';
        }

        
    elseif(empty($_POST['mdp2']))
        {
            $mdp2Err = 'Le champ "Confirmez votre mot de passe" est vide';
        }
    
        
        
    elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email']))
        {
            $mailErr = "L'adresse mail n'est pas valide";
        }
    elseif(($_POST['mdp'] != $_POST['mdp2']))
        {
            $mdp2Err = "Les mots de passe ne correspondent pas";
        }
    elseif (isset($_POST['cgu'])) 
    {
        $Insert_into = $m->formulaire_super($_POST['Nom'],$_POST['Prenom'],$_POST['email'],$_POST['mdp']);
        echo "Vous êtes inscrit avec succès! &nbsp; <a href='../Accueil/Accueil.php'>Retourner à l'accueil</a>";
        $AfficherFormulaire=0;
    }
    
    else
        {
            $cguErr = "Veuillez acceptez les Conditions Générales d'Utilisation";


        }
    }
    
    

if($AfficherFormulaire==1)
{
    require "fin_html.php";
}
    ?>