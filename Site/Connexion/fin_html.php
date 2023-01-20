
        </div>
        <div class="container2">
            <h4><a href =../Accueil/accueil.php>Revenir à la page d'accueil</a></h4>
            <h1>Se connecter</h1>
            <!-- J'ai rajouté deux <span class="err"> pour gérer les erreurs en php -->
            <form action="Connexion.php" method="POST">
                <div class="form">
                    <input type="email" name="emailConnexion" placeholder="Adresse email">
                        <span class="err"><?php echo $mailErr;?></span>
                    <input type="password" name="mdpConnexion" placeholder="Mot de passe">
                        <span class="err"><?php echo $mdpErr;?></span>
                    <input type="submit" name="connexion" value="Se connecter">
                </div>
            </form>

                <div class="c1">
                    <p><a href ="../Mot_de_passe_oublié/mot_passe_oublie.php"> Mot de passe oublié ? </a></p>
                </div>

                <div class="content">
                    <p>Vous n'avez pas encore de compte ? <a href="../Accueil_Inscription/Accueil_inscription.html">S'inscrire</a> </p> <br>
                </div>
        </div>   
</body>
</html>