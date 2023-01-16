<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accueil - Animath</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>
   <?php session_start();
    
    ?>
    <div class="header">
        <div class = "container">
            <div class = "navbar">
                <div class="logo">
                    <a href="accueil.html"><img src="../images/logo.png" alt="Logo Animath"></a>
                </div>  
                <nav>
                    <ul id = "MenuItems">
                        <li><a href="../accueil/accueil.html">Accueil</a></li>
                        <li><a href="../programme/programme.html">Programme</a></li>
                        <li><a href="../planning/planning.html">Planning</a></li>
                        <li><a href="../FAQs/FAQs.html">FAQs</a></li>    
                        <?php require_once '../Accueil/Verify_connexion.php';
                        ?>
                        <li><a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </nav>
            </div>

            <div class="row">
                <div class="col_2">
                    <h1>Découvrir la magie des mathématiques et plein d'autres choses encore !</h1>
                    <p><br>
                        &#8226; &#160;  C'est gratuit et accessible pour tous !<br>
                        &#8226; &#160;  Animations, jeux, manipulation ! et bien plus encore<br>
                        &#8226; &#160;  Apprendre en &#171; s'amusant &#187;<br><br>
                    </p>
                    <a href="../Connexion/Connexion.html" class = "bn">Je réserve</a>
                    
                </div>
                <div class="col_2">
                    <img src="../images/fun3.png">
                </div>
            </div>
        </div>
        <div class="titre"><h4>Dédra&#171; math &#187;isons les mathématiques, tous ensemble, rejoignez nous pour une aventure hors du commun ! </h4></div>
    </div>
     
    <!--réservation -->

    <div class="reserver">
        <h2 class="title">Comment faire pour réserver un créneau?</h2>
        <div class="small-container">
            <div class="row">
                <div class="c_c">
                    <ol>
                        <li>Choisissez l'activité qui vous captive</li>
                        <li>Saisissez vos informations personnelles ainsi<br> que les horaires qui vous conviennent</li>
                        <li>Confirmez votre réservation<br></li>
                        
                    </ol>
                    
                </div>
                <div class="c_c">
                    <img src="../images/fun6.png">
                </div>
            </div>
        </div>
        <a href="../Connexion/Connexion.html" class = "bn">Je réserve</a>
        <br>
    </div>


    <div class="obj">
        <h2 class="title">C'est quoi cet événement ! et pourquoi y participer ?...</h2>
        <div class="small-container">
            <div class="row">
                <div class="c_c">
                    <img src="../images/peurm.png" width=auto height=auto alt="Les enfant ont peur des maths">
                </div>
                <p class="c_c">
                    La peur des mathématiques devient problématique pour les élèves, ce qui bloque
                    leur apprentissage, et les professeurs sont de plus en plus impuissants fâce
                    à de telles situations. Et si on voyait les mathématiques d'une manière plus fun et amusante !  <br><br>
                    <strong>Notre objectif :</strong> Rendre les mathématiques plus divertissantes afin 
                    de faciliter son apprentissage, et prendre du plaisir à découvrir le monde magique des
                    mathématiques ! <br><br>
                    C'est aussi une opportunité pour les enseignants de dénicher de nouvelles idées pédagigiques
                    pour mieux transmettre l'information et pour un meilleur apprentissage !
                    C'est aussi une occasion en or pour nouer des contacts et s'enrichir !
                </p>
            </div>
        </div>
        <a href="../Connexion/Connexion.html" class = "bn">Je participe</a>
    </div>
    <div class="titre"><h4>Le bus sera avant tout de prendre du plaisir ! </h4></div>


    <div class="reserver">
        <h2 class="title">En plein milieu de la capitale ...</h2>
        <div class="small-container">
            <div class="row">
                <div class="c_c">
                    <p><br>
                        L'événement se déroulera à :<br> 
                        Place Saint Suplice<br>
                        Paris, 75006 France.
            
                    </p>
                    
                </div>
                <div class="c_c">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d1141.9839421042664!2d2.332366051022532!3d48.851201977288845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e3!4m0!4m5!1s0x47e671da1ae657d7%3A0xfb1847af1f52d480!2sPl.%20Saint-Sulpice%2C%2075006%20Paris!3m2!1d48.8512418!2d2.3332143!5e0!3m2!1sfr!2sfr!4v1673105324058!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <a href="../Connexion/Connexion.html" class = "bn">Je réserve</a>
    </div>


    <!--réservation -->



    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="f1">
                    <h3>Liens utiles</h3>
                    <ul>
                        <li><a href="../Accueil/accueil.html">Accueil</a></li>
                        <li><a href="../Programme/Programme.html">Programme</a></li>
                        <li><a href="../Planning/Planning.html">Planning</a></li>
                        <li><a href="../FAQs/FAQs.html">FAQs</a></li>
                        <li><a href="../Connexion/Connexion.php">Connexion</a></li>
                        <li><a href="https://www.animath.fr/contact/">Contactez-nous</a></li>
                    </ul>
                </div>
                <div class="f2">
                    <img src="../images/logo.png" alt="Animath">
                    <p>
                        Notre but est de favoriser le goût et la pratique des mathématiques chez les jeunes et le plaisir d’en faire
                    </p>
                </div>
                <div class="f3">
                    <h3>Nous suivre</h3>
                    <ul>
                        <li><a href="https://www.facebook.com/AssoAnimath/" target="_blank">Facebook</a></li>
                        <li><a href="https://twitter.com/Asso_Animath?s=20&t=4vhBVrcM9UpK7FsUJt8maw" target="_blank">Twitter</a></li>
                        <li><a href="https://www.instagram.com/asso_animath/?hl=fr" target="_blank">Instagram</a></li>
                        <li><a href="https://www.youtube.com/user/AssoAnimath" target="_blank">Youtube</a></li>
                        
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2023 - Animath</p>
        </div>
    </div>

</body>
</html>   


                