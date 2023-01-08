<?php
  require "debut_html.html";
?>
<?php  
require_once ('/xampp/htdocs/SAE-ANIMATH-main/Site_/Model.php');
$m = Model::getModel();


//par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
$AfficherFormulaire=1;
//traitement du formulaire:
if(isset($_POST['Nom'],$_POST['Prenom'],$_POST['email'],$_POST['mdp'],$_POST['mdp2'],))
    {

    if(empty($_POST['Nom']))
        {
        echo "Le champ Nom est vide.";
        } 
    
    elseif(empty($_POST['Prenom']))
        {
        echo "Le champ Prenom est vide.";
        } 

    elseif(empty($_POST['email']))
        {
            echo "Le champ Adresse mail est vide ";
        }
    elseif(empty($_POST['mdp']))
        {
                echo "Le champ Mot de Passe est vide";
        }

        
    elseif(empty($_POST['mdp2']))
        {
            echo"Le champ Confirmez votre mot de passe est vide";
        }
    
        
        
    elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email']))
        {
            echo"L'adresse mail n'est pas valide";
        }
    elseif(($_POST['mdp'] != $_POST['mdp2']))
        {
            echo"Les mots de passe ne correspondent pas";
        }
    elseif (isset($_POST['cgu'])) 
    {
        $Insert_into = $m->formulaire_super($_POST['Nom'],$_POST['Prenom'],$_POST['email'],$_POST['mdp']);
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
    require "fin_html_Inscription(super).html";
}
    ?>