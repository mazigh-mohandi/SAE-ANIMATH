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
$nomErr = ""; $prenomErr = ""; $etabErr = ""; $nivErr = ""; $villeErr = ""; 
$mailErr = ""; $mdpErr = ""; $mdp2Err = ""; $cguErr = "";

//traitement du formulaire:
if(isset($_POST['NomP'],$_POST['PrenomP'],$_POST['etablissementP'],$_POST['niveauP'],$_POST['villeP'],$_POST['emailP'],$_POST['mdpP'],$_POST['mdp2P']))
    {

    if(empty($_POST['NomP']))
        {
            $nomErr = 'Le champ "Nom" est vide';
        } 
    
    elseif(empty($_POST['PrenomP']))
        {
            $prenomErr = 'Le champ "Prénom" est vide.';
        } 
    elseif(empty($_POST['etablissementP']))
        {
            $etabErr = 'Le champ "Etablissement" est vide.';
        }
    elseif(empty($_POST['niveauP']))
        {
            $nivErr = 'Le champ "Niveau Scolaire" est vide.';
        }  
    elseif(empty($_POST['villeP']))
        {
            $villeErr = 'Le champ "Ville" est vide.';
        }  

    elseif(empty($_POST['emailP']))
        {
            $mailErr = 'Le champ "Adresse mail" est vide ';
        }
    elseif(empty($_POST['mdpP']))
        {
            $mdpErr = 'Le champ "Mot de Passe" est vide';
        }

        
    elseif(empty($_POST['mdp2P']))
        {
            $mdp2Err = 'Le champ "Confirmez votre mot de passe" est vide';
        }
    
        
        
    elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['emailP']))
        {
            $mailErr = "L'adresse mail n'est pas valide";
        }
    elseif(($_POST['mdpP'] != $_POST['mdp2P']))
        {
            $mdp2Err = "Les mots de passe ne correspondent pas";
        }
    elseif (isset($_POST['cguP'])) 
    {
        $Insert_into = $m->formulaire_prof($_POST['NomP'],$_POST['PrenomP'],$_POST['etablissementP'],$_POST['niveauP'],$_POST['villeP'],$_POST['emailP'],$_POST['mdpP'],$_POST['mdp2P']);
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