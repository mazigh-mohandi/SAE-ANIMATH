<?php

$contenu = file_get_contents("Export_-_IUT.json");
$t_decode = json_decode($contenu, true);
header('Content-type: text/html; charset=UTF-8');
$donnees_s = [];
$i=0;

function getIDStand($nom){
    $bd = new PDO('mysql:host=localhost;dbname=Animath','root','');
    $req = $bd->prepare('SELECT id_stand FROM stand WHERE nom=:nom');
    $req->bindValue(':nom',$nom);
    $req->execute();
    $test = $req->fetch(PDO::FETCH_ASSOC);
    return $test;

  }

  function heures_en_min($heures) 
{ 
    $minutes = 0; 
    if (strpos($heures, ':') !== false) 
    { 
        // Split hours and minutes. 
        list($heures, $minutes) = explode(':', $heures); 
    } 
    return $heures * 60 + $minutes; 
} 

// Transform minutes like "105" into hours like "1:45". 
function minutes_en_Heures($minutes) 
{ 
    $heures = (int)($minutes / 60); 
    $minutes -= $heures * 60; 
    return sprintf("%d:%02.0f", $heures, $minutes); 
}  


foreach ($t_decode['Import'] as $key => $value) {
    $i+=1;
    foreach ($value as $k => $v) {
            if($k == 'Nb max de visiteurs'){
                $donnees_s[$i]['Nb max de visiteurs'] = $v ;    
    }
        if ($k == "Description de l'activité") {
            $donnees_s[$i]["Description de l'activité"] = $v ;  
        }
        if ($k == "Titre du stand") {
            $donnees_s[$i]["Titre du stand"] = $v ;   
        }
        if ($k == "9h - 18h") {
            $donnees_s[$i]["9h - 18h"] = $v ;   
        }
        if ($k == "Temps intersession") {
            $donnees_s[$i]["Temps intersession"] = $v ;   
        }
        if ($k == "Durée") {
            $donnees_s[$i]["Durée"] = $v ;   
        }
        if ($k == "Nombre d'animateurs par jour  [jeudi]") {
            $donnees_s[$i]["jeudi"] = $v ;   
        }
        if ($k == "Nombre d'animateurs par jour  [vendredi]") {
            $donnees_s[$i]["vendredi"] = $v ;   
        }
        if ($k == "Pause déjeuner - début") {
            $donnees_s[$i]["pause_start"] = $v ;   
        }
        if ($k == "Pause déjeuner - fin") {
            $donnees_s[$i]["pause_end"] = $v ;   
        }
        if ($k == "Niveaux des visiteurs scolaires") {
            $nv = explode(",",$v);
            $donnees_s[$i]["nv_scol"] = $nv ;   
        }
        if ($k == "Vous serez présent [Jeudi 25 mai]") {
    
            $donnees_s[$i]["la_jeudi"] = $v ;   
        }
        if ($k == "Vous serez présent [Vendredi 26 mai]") {
    
            $donnees_s[$i]["la_vendredi"] = $v ;   
        }
}
}
 var_dump($donnees_s);
foreach ($donnees_s as $key => $value) {
    $bd = new PDO('mysql:host=localhost;dbname=Animath','root','');
    $req = $bd->prepare('INSERT INTO Stand(nom,description,capacite,journee,duree,inters,nbex_j,nbex_v) VALUES (:nom,:description,:capacite,:journee,:duree,:inters,:nbex_j,:nbex_v)');
    foreach ($value as $k => $v) {
        if($k == 'Nb max de visiteurs'){
            $req->bindValue(':capacite',$v);  
            echo 'ok';
        }
    elseif ($k == "Description de l'activité") {
        $req->bindValue(':description',$v);
        echo 'ok';
    }
    elseif ($k == "Titre du stand") {
        $req->bindValue(':nom',$v);  
        echo 'ok'; 
    }
    elseif ($k == "9h - 18h") {
        if($v == 'oui'){
            $v = TRUE;
            $req->bindValue(':journee', $v);
            echo 'ok';
        }
       
        else{
            $v = FALSE;
            $req->bindValue(':journee', $v);
            echo 'ok';
        }
        
    }
    elseif ($k == "Temps intersession") {
        $req->bindValue(':inters', $v);
        echo 'ok';
    }
    elseif ($k == "Durée") {
        $req->bindValue(':duree', $v);
        echo 'ok';
    }
    elseif ($k == "jeudi") {
        if($v == '+'){
            $v = NULL;
            $req->bindValue(':nbex_j', $v);
            echo 'ok';
        }
        else{
            $req->bindValue(':nbex_j', $v);
        echo 'ok';
        }
    }
    elseif ($k == "vendredi") {
        if($v == '+'){
            $v = NULL;
            $req->bindValue(':nbex_v', $v);
            echo 'ok';
        }
        else{
            $req->bindValue(':nbex_v', $v);
            echo 'ok';
        }
    }     

}
$req->execute();
$test = $req->fetch(PDO::FETCH_ASSOC);

}