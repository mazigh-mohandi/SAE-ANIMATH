<div class="container2">
    <h4><a href ="../Accueil/accueil.php">Revenir à la page d'accueil</a></h4>

    <h1>S'inscrire</h1>
    <!-- Ne pas toucher aux <span class="err">, ça sert à afficher les erreurs et c'est pour faire 
        marcher le php 
        Ne pas changer les name, sinon ça fera des erreurs dans le php-->
    <form action="Inscription(expo).php" method="POST">  
        <div class="form"> 
            <input type="Text" name="NomE" placeholder="Nom">
                <span class="err"><?php echo $nomErr;?></span>
            <input type="time" name="hDeb" placeholder="Heure d'ouverture">
                <span class="err"><?php echo $hdErr;?></span>
            <input type="time" name="hFin" placeholder="Heure de fermeture">
                <span class="err"><?php echo $hfErr;?></span>
            <input type="number" min="1" step="1" name="capacite" placeholder="Capacité">
                <span class="err"><?php echo $capErr;?></span>
            <input type="Text" name="niveau" placeholder="Niveau">
                <span class="err"><?php echo $nivErr;?></span>
            <input type="time" name="duree" placeholder="Durée">
                <span class="err"><?php echo $durErr;?></span>
                <input type="submit" value="Valider l'inscription" name="boutton-valider">
        </div>

        <div class="cb">
             <input type="checkbox" id="acceptation" name="cb" value="acceptation">
             <label for="acceptation"><span>En cochant cette case, vous affirmez l'exactitude des renseignements précédents</span></label><br>
             <span class="err"><?php echo $cbErr;?></span>
         </div>


    </form>
</div>   
</body>
</html>