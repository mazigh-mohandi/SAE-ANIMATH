<?php
class Model
{
    private $bd; //Attribut privé contenant l'objet PDO
    //Attribut qui contiendra l'unique instance du modèle
    private static $instance = null;
    /**
    * Constructeur créant l'objet PDO et l'affectant à $bd
    */
    private function __construct()
        {
            $this->bd = new PDO('mysql:host=localhost;dbname=Animath','root','');
            $this->bd->query("SET NAMES 'utf8'");
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    /**
    * Méthode permettant de récupérer l'instance de la classe Model
    */
    public static function getModel()
        {
            //Si la classe n'a pas encore été instanciée
            if (self::$instance === null) 
            {
                self::$instance = new self(); //On l'instancie
            }
    return self::$instance; //On retourne l'instance
        }
    
    
    public function formulaire_super($nom,$prenom,$email,$mdp)
    {
        $id_super=1;
        $pwd=md5($mdp);
        $i=1;
       
        while ($i==1)
        {
            $id_super_Exist = $this->bd->prepare("SELECT id_super FROM Superviseurs WHERE id_super = :id_super");
            
            $id_super_Exist->bindValue(':id_super', $id_super, PDO::PARAM_INT);
            $id_super_Exist->execute();
            //on exécute la requête
            
            $i= $id_super_Exist->rowCount();
            
            if($i == 1)
            {
                $id_super++;
            }
            else
            {
                $req=  $this->bd->prepare("INSERT INTO Superviseurs SET id_super='$id_super',nomSuper='$nom',prenomSuper='$prenom',mail='$email',mdp='$pwd'");
                $req->execute();
                $i=2;
            }
        
            
        }
    }


    public function formulaire_prof($nom,$prenom,$etablissement,$niveau,$ville,$email,$mdp)
    {
        $id_prof=1;
        
        $i=1;
        $pwd=md5($mdp);
        while ($i==1)
        {
            $id_prof_Exist = $this->bd->prepare("SELECT id_prof FROM Profs WHERE id_prof = :id_prof");
            
            $id_prof_Exist->bindValue(':id_prof', $id_prof, PDO::PARAM_INT);
            $id_prof_Exist->execute();
            
            
            $i= $id_prof_Exist->rowCount();
            
            if($i == 1)
            {
                $id_prof++;
            }
            else
            {              
                $req=  $this->bd->prepare("INSERT INTO Profs SET id_prof='$id_prof',nomProf='$nom',prenomProf='$prenom',etablissement='$etablissement',niveau='$niveau',ville='$ville',mail='$email',mdp='$pwd'");
                $req->execute();
                $i=2;
            }
        
            
        }
    }
    
    


    public function formulaire_expo($nom,$ho,$hf,$cap,$niv,$duree)
    {
        $id_expo=1;
        
        $i=1;
        while ($i==1)
        {
            $id_expo_Exist = $this->bd->prepare("SELECT id_expo FROM Exposants WHERE id_expo = :id_expo");
            
            $id_expo_Exist->bindValue(':id_expo', $id_expo, PDO::PARAM_INT);
            $id_expo_Exist->execute();
            
            
            $i= $id_expo_Exist->rowCount();
            
            if($i == 1)
            {
                $id_expo++;
            }
            else
            {              
                $req=  $this->bd->prepare("INSERT INTO Exposants SET id_expo='$id_expo',nomExposant='$nom',heure_ouvert='$ho',heure_ferme='$hf',capacite='$cap',niveau='$niv',duree='$duree'");
                $req->execute();
                $i=2;
            }
        
            
        }
    }


    
    public function connexion($email,$mdp)

    {
            
        $super = $this->bd->prepare("SELECT mail FROM Superviseurs WHERE mail = '$email' ");
        $super->execute();
        $prof = $this->bd->prepare("SELECT * FROM Profs WHERE mail = '$email'");
        $prof->execute();

        if(($prof->rowCount() == 1))
            {
                 
                $mdpCrypte = $this->bd->prepare("SELECT mdp FROM Profs WHERE mail = '$email'");
                $mdpCrypte->execute();
                $mdpCrypte = $mdpCrypte->fetch(PDO::FETCH_NUM);
                
               
                if(md5($mdp)==$mdpCrypte[0])
                    {
                        $_SESSION['mail'] = $email;
                        $_SESSION['role']=$_SESSION['role']+2;
                        echo"Connexion reussi";
                        header('Location: ../Accueil/accueil.php');
                        exit();

                    }
                else
                    {
                        echo"Adresse mail ou mdp incorrect";
                    }
                
            }
        elseif (($super->rowCount()==1))
            {
                
                $mdpCrypte = $this->bd->prepare("SELECT mdp FROM Superviseurs WHERE mail = '$email'");
                $mdpCrypte->execute();
                $mdpCrypte = $mdpCrypte->fetch(PDO::FETCH_NUM);
                
               
                if(md5($mdp)==$mdpCrypte[0])
                    {
                        $_SESSION['mail'] = $email;
                        $_SESSION['role']=$_SESSION['role']+1;
                        echo"Connexion reussi";
                        header('Location: ../Accueil/accueil.php');
                        exit();

                    }
                else
                    {
                        echo"Adresse mail ou mdp incorrect";
                    }
            }
        
    }
}
?>

