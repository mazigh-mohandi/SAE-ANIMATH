<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <header class="main-head">
        
   <section>
       <h1> Connexion</h1>
       <br><form action="../Accueil.html" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données dans la même page -->
           <label>Adresse Mail</label>
           <input type="email" name="email" placeholder="Email">
           <br><label >Mots de Passe</label>
           <input type="password" name="mdp" placeholder="Mot de passe">
           <br><p class ="mp"><a href ="Mot de passe oublié.php"> Mot de passe oublié ? </a></p>
           <p class ="inscr">Vous n'avez pas de compte ? <a href ="../Accueil_inscription.php"> <span>inscrivez vous</span></a></p>
           <input type="submit" value="Connexion" name="boutton-valider">
       </form>
   </section> 
</body>
</html>