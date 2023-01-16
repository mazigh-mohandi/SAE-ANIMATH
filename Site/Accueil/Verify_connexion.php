<?php

    if($_SESSION['role']==2)
        {
           echo" <li><a href='../mon_compte(prof)/mon_compte(prof).html'>Mon Compte <i class='fa fa-user'></i></a></li> ";
        }
    elseif($_SESSION['role']==1)
        {
            echo" <li><a href='../mon_compte(super)/mon_compte(super).html'>Mon Compte <i class='fa fa-user'></i></a></li> ";
    
        }
    elseif($_SESSION['role']==0)
    {
        echo "<li><a href='../Connexion/Connexion.php'>Connexion <i class='fa fa-user'></i></a></li> ";
    }

?>