<?php
$nom = "Nom ";
$prenom = "Prenom";
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="profile-container">
    <div class="profile-header">
      <div class="profile-header-img">
        <img src="../images/user-modified.png" alt="Profile Picture">
      </div>
      <div class="profile-header-info">
        <h1><?php echo $nom; echo $prenom;?></h1>
      </div>
    </div>
    <div class="profile-nav">
      <ul>
        <li><a href="../Inscription(expo)/Inscription(expo).php">Inscrire Exposant</a></li>
        <li><a href="#">Mes Réservations</a></li>
        <li><a href="#">Modifier Evenement</a></li>
        <li><a href="#">Liste Participants</a></li>
      </ul>
    </div>
  </div>
</body>
</html>