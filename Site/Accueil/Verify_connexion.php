<?php
    if (isset($_SESSION['role']))
    {
        if($_SESSION['role']==2)
            {
            echo" <li><a href='../mon_compte(prof)/mon_compte(prof).php'>Mon Compte <i class='fa fa-user'></i></a></li> ";
            }
        elseif($_SESSION['role']==1)
            {
                echo" <li><a href='../mon_compte(super)/mon_compte(super).php'>Mon Compte <i class='fa fa-user'></i></a></li> ";
        
            }
        else
        {
            echo "<li><a href='../Connexion/Connexion.php'>Connexion <i class='fa fa-user'></i></a></li> ";
        }
    }
    else
    {
            echo "<li><a href='../Connexion/Connexion.php'>Connexion <i class='fa fa-user'></i></a></li> ";
    }
    

?>
