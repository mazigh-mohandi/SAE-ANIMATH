<?php
  require "debut_html.html";
?>
<?php  
require_once ('/xampp/htdocs/SAE-ANIMATH-main/Site_/Model.php');
$m = Model::getModel();


//par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
$AfficherFormulaire=1;
//traitement du formulaire:
if(isset($_POST['NomP'],$_POST['PrenomP'],$_POST['etablissementP'],$_POST['niveauP'],$_POST['villeP'],$_POST['emailP'],$_POST['mdpP'],$_POST['mdp2P']))
    {

    if(empty($_POST['NomP']))
        {
        echo "Le champ Nom est vide.";
        } 
    
    elseif(empty($_POST['PrenomP']))
        {
        echo "Le champ Prenom est vide.";
        } 
    elseif(empty($_POST['etablissementP']))
        {
        echo "Le champ Etablissement est vide.";
        }
    elseif(empty($_POST['niveauP']))
        {
        echo "Le champ Niveau Scolaire est vide.";
        }  
    elseif(empty($_POST['villeP']))
        {
        echo "Le champ Ville  est vide.";
        }  

    elseif(empty($_POST['emailP']))
        {
            echo "Le champ Adresse mail est vide ";
        }
    elseif(empty($_POST['mdpP']))
        {
                echo "Le champ Mot de Passe est vide";
        }

        
    elseif(empty($_POST['mdp2P']))
        {
            echo"Le champ Confirmez votre mot de passe est vide";
        }
    
        
        
    elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['emailP']))
        {
            echo"L'adresse mail n'est pas valide";
        }
    elseif(($_POST['mdpP'] != $_POST['mdp2P']))
        {
            echo"Les mots de passe ne correspondent pas";
        }
    elseif (isset($_POST['cguP'])) 
    {
        $Insert_into = $m->formulaire_prof($_POST['NomP'],$_POST['PrenomP'],$_POST['etablissementP'],$_POST['niveauP'],$_POST['villeP'],$_POST['emailP'],$_POST['mdpP'],$_POST['mdp2P']);
        echo"Vous etes inscrit avec succes!";
        $AfficherFormulaire=0;
    }
    
    else
        {
            echo"Veuillez acceptez cgu";

        }
    }
    
    

if($AfficherFormulaire==1)
{
    require "fin_html.html";
}
    ?>