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
$nomErr = ""; $hdErr = ""; $hfErr = ""; $capErr = ""; $nivErr = ""; $durErr = ""; $cbErr="";

//traitement du formulaire:
if(isset($_POST['NomE'],$_POST['hDeb'],$_POST['hFin'],$_POST['capacite'],$_POST['niveau'],$_POST['duree']))
    {

    if(empty($_POST['NomE']))
        {
            $nomErr = 'Le champ "Nom" est vide';
        } 
    
    elseif(empty($_POST['hDeb']))
        {
            $hdErr = 'Veuillez renseigner l\'heure de début.';
        } 
    elseif(empty($_POST['hFin']))
        {
            $hfErr = 'Veuillez renseigner l\'heure de début..';
        }
    elseif(empty($_POST['capacite']))
        {
            $capErr = 'Veuillez renseigner la capacité';
        }  
    elseif(empty($_POST['niveau']))
        {
            $nivErr = 'Veuillez renseigner le niveau.';
        }  

    elseif(empty($_POST['duree']))
        {
            $durErr = 'Veuillez renseigner la durée';
        }
    
        
        
    elseif (isset($_POST['cb'])) 
    {
        $Insert_into = $m->formulaire_expo($_POST['NomE'],$_POST['hDeb'],$_POST['hFin'],$_POST['capacite'],$_POST['niveau'],$_POST['duree']);
        echo "Vous avez inscrit l'exposant avec succès! &nbsp; <a href='../Accueil/Accueil.php'>Retourner à l'accueil</a>";
        $AfficherFormulaire=0;
    }
    
    else
        {
            $cbErr = "Veuillez cocher la case";

        }
    }
    
    

if($AfficherFormulaire==1)
{
    require "fin_html.php";
}
    ?>