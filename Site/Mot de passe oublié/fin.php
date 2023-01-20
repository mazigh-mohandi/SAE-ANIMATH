<div class="container2">
            <h4><a href =../accueil/accueil.html>Revenir à la page d'accueil</a></h4>
            <h1>Mot de passe oublié</h1>
            <p>Veuillez saisir votre email de connexion afin de recevoir le lien de réinitialisaton de votre mot de passe</p>
            <form action="Mot_passe_oublie.php" method="post">
                <div class="form">
                    <input type="email" placeholder="saisir votre email">
                        <span class="err"><?php echo $mailErr;?></span>
                    <input type="submit" name="oublie" value="Recevoir le lien">
                
                </div>
            </form>    
          
        </div>   
</body>
</html>