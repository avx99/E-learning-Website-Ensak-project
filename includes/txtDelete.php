<?php


if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
 }

file_put_contents("../FILES/".$_POST['fichier'].".txt","");

echo "le contenu du forum ".$_POST['fichier']." est supprimer"."<br>"."<hr>";