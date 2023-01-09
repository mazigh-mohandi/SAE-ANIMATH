<div class="logo">
    <a href="../accueil/accueil.html"><img src="../images/logo.png" alt="Logo Animath"></a>
</div>  

<div class="container2">
    <h4><a href =../accueil/accueil.html>Revenir à la page d'accueil</a></h4>

    <h1>S'inscrire</h1>
    <!-- Ne pas toucher aux <span class="err">, ça sert à afficher les erreurs et c'est pour faire 
        marcher le php 
        Ne pas changer les name, sinon ça fera des erreurs dans le php-->
    <form action="Inscription(prof).php" method="POST">  
        <div class="form"> 
            <input type="Text" name="NomP" placeholder="Nom">
                <span class="err"><?php echo $nomErr;?></span>
            <input type="Text" name="PrenomP" placeholder="Prénom">
                <span class="err"><?php echo $prenomErr;?></span>
            <input type="Text" name="etablissementP" placeholder="Etablissement">
                <span class="err"><?php echo $etabErr;?></span>
            <input type="Text" name="niveauP" placeholder="Niveau Scolaire">
                <span class="err"><?php echo $nivErr;?></span>
            <input type="Text" name="villeP" placeholder="Ville">
                <span class="err"><?php echo $villeErr;?></span>
            <input type="text" name="emailP" placeholder="Adresse mail">
                <span class="err"><?php echo $mailErr;?></span>
            <input type="password" name="mdpP" placeholder="Mot de passe">
                <span class="err"><?php echo $mdpErr;?></span>
            <input type="password" name="mdp2P" placeholder="Confirmez votre mot de passe">
                <span class="err"><?php echo $mdp2Err;?></span>
        </div>

        <div class="cg">
             <input type="checkbox" id="conditions" name="cguP" value="conditions">
             <label for="conditions"><span>J'ai lu et j'accepte les conditions d'utilisation</span></label>
             <span class="err"><?php echo $cguErr;?></span>
         </div>

        <input type="submit" value="S'inscrire" name="boutton-valider">
        
        <div class="content">
            <p>Vous avez déja un compte ? <a href="../Connexion/Connexion.html">Se connecter</a> </p> <br>
        </div>
    </form>
</div>   
</body>
</html>