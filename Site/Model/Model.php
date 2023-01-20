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

    public function alimenter_creneaux()
    {   $i=1;
        $ligne=$this->bd->prepare("SELECT id_stand FROM Stand ");
        $ligne->execute();
        
       
        
        while($i<$ligne->rowCount())
        {
            $recup_data=  $this->bd->prepare("SELECT * FROM Stand WHERE id_stand='$i'");
            $recup_data->execute();
            $tab=$recup_data->fetch(PDO::FETCH_BOTH);
            $inters= strtotime(date("00:00:00")); 
            $h_deb= strtotime(date("09:00:00")); 
            $h_fin= strtotime(date("00:00:00")); 
            
            while($h_fin<=strtotime($tab["deb_dej"])) 
                {
                    $a=0;
                    $h_deb=strtotime($h_deb)+strtotime($tab["inters"]);
                    $h_fin=strtotime($h_deb)+strtotime($tab["duree"]);
                    while($a<=$tab["nbex_j"])
                    {$b=0;
                        while ($b==1)
                            {
                                $id_creneaux_Exist = $this->bd->prepare("SELECT id_creneaux FROM Creneaux WHERE id_creneaux = :creneaux");
            
                                $id_creneaux_Exist->bindValue(':id_creneaux', $id_creneaux, PDO::PARAM_INT);
                                $id_creneaux_Exist->execute();
            
            
                                $b= $id_creneaux_Exist->rowCount();
            
                                if($b == 1)
                                    {
                                        $id_creneaux++;
                                    }
                                else
                                    {              
                                        $creneau=$this->bd->prepare("INSERT INTO Creneaux SET id_creneaux='$id_creneaux',journee='jeudi',heure_debut ='$h_deb',
                                         heure_fin='$h_fin'");
                                        $creneau->execute();
                                        $b=2;
                                     }
        
                                
                            }
                        $a++;
                    }
        $i++; 
        }
        
        
    }
}
}
?>

