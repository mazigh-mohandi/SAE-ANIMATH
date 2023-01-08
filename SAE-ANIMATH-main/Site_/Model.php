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
        
        $i=1;
        $pwd=password_hash('$mdp',PASSWORD_DEFAULT);
        while ($i==1)
        {
            $id_super_Exist = $this->bd->prepare("SELECT id_super FROM Superviseurs WHERE id_super = :id_super");
            
            $id_super_Exist->bindValue(':id_super', $id_super, PDO::PARAM_INT);
            $id_super_Exist->execute();
            //on exécute la requête
            
            $i= id_super_Exist->rowCount();
            
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
        $pwd=password_hash('$mdp',PASSWORD_DEFAULT);
        while ($i==1)
        {
            $id_prof_Exist = $this->bd->prepare("SELECT id_prof FROM Profs WHERE id_prof = :id_prof");
            
            $id_prof_Exist->bindValue(':id_prof', $id_prof, PDO::PARAM_INT);
            $id_prof_Exist->execute();
            
            
            $i= $id_prof_Exist->rowCount();
            
            if($i == 1)
            {
                echo"id_prof existe";
                $id_super++;
                

            }
            else
            {
                echo"id_prof existe pas";
                
                $req=  $this->bd->prepare("INSERT INTO Profs SET id_prof='$id_prof',nomProf='$nom',prenomProf='$prenom',etablissement='$etablissement',niveau='$niveau',ville='$ville',mail='$email',mdp='$pwd'");
                $req->execute();
                $i=2;
            }
        
            
        }
    }

}
?>