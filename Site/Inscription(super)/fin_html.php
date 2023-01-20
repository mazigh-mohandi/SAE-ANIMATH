

<div class="container2">
    <h4><a href ="../Accueil/Accueil.html">Revenir à la page d'accueil</a></h4>

    <h1>S'inscrire</h1>
    <!-- Ne pas toucher aux <span class="err">, ça sert à afficher les erreurs et c'est pour faire 
        marcher le php 
        Ne pas changer les name, sinon ça fera des erreurs dans le php-->
    <form action="Inscription(super).php" method="POST">   
            <div class="form">
                <input type="Text" name="Nom" placeholder="Nom">
                    <span class="err"><?php echo $nomErr;?></span>
                <input type="Text" name="Prenom" placeholder="Prénom">
                    <span class="err"><?php echo $prenomErr;?></span>
                <input type="Text" name="email" placeholder="Adresse mail">
                    <span class="err"><?php echo $mailErr;?></span>
                <input type="password" name="mdp" placeholder="Mot de Passe">
                    <span class="err"><?php echo $mdpErr;?></span>
                <input type="password" name="mdp2" placeholder="Confirmez votre mot de passe">
                    <span class="err"><?php echo $mdp2Err;?></span>
                <input type="submit" value="S'inscrire" name="boutton-valider">
            </div>

            <div class="cg">
                <input type="checkbox" id="conditions" name="cgu" value="conditions">
                <label for="conditions"><span>J'ai lu et j'accepte les conditions d'utilisation</span></label><br>
                <a href="../CGU/CGU.html"><span>Conditions générales d'utilisation</a></span><br>
                <span class="err"><?php echo $cguErr;?></span>
                
            </div>


            <div class="content">
            <p>Vous avez déja un compte ? <a href="../Connexion/Connexion.php">Se connecter</a> </p> <br>
            </div>
            </form>
        </div>   
</body>
</html>