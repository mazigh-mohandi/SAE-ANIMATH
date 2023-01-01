<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <section>
       <h1> Inscription </h1>
       <form action="#" method="POST">   
           <label>Nom</label>
           <input type="Text" name="Nom" placeholder="Nom">
           <label>Prénom</label>
           <input type="Text" name="Prénom" placeholder="Prénom">
           <label>N° de téléphone</label>
           <input type="tel" name="N° de téléphone" placeholder="N° téléphone">
           <label>Adresse e-mail</label>
           <input type="email" name="Adresse mail" placeholder="Adresse mail">
           <label>Mot de passe</label>
           <input type="password" name="mp" placeholder="Mot de passe">
           <label>Confirmez votre mot de passe</label>
           <input type="password" name="mdp" placeholder="Confirmez votre mot de passe">
           <div class="cond">
                <input type="checkbox" id="conditions" name="accepter" value="conditions">
                <label for="conditions"><span>J'ai lu et j'accepte les conditions d'utilisation</span></label>
           </div>
           <input type="submit" value="S'inscrire" name="boutton-valider">
       </form>
   </section> 
</body>
</html>