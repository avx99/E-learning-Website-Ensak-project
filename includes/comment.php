<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
}


// if (!isset($_POST['sit']))
//     die("page inaccessible");


$name = "Oussama Abouzid";
$email = "@@";
$sexe = "homme";
$coursfile = "FILES/gitComment.txt";



function addComment($comment)
{
    global $coursfile;
    global $email;
    global $name;
    global $sexe;
    $file = fopen("../".$coursfile, "a");
    fwrite($file, $comment);
    fwrite($file, ";");
    fwrite($file, $name);
    fwrite($file, ";");
    fwrite($file, $sexe);
    fwrite($file, ";");
    fwrite($file, date("Y/m/d") . " " . date("h:i"));
    fwrite($file, ";");
    fwrite($file, $email);
    fwrite($file, "\n");
    fclose($file);
}


addComment($_POST['message']);
header("Location: ../courses.php");