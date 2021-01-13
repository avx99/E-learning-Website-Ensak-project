<?php


if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
 }

// if(!isset($_POST['sb']))
//     die("Page inaccessible !");



if(empty($_POST['emailCon']) || empty($_POST['nameCon']) || empty($_POST['messageCon']))
{
    header("Location: ../contact.php?vid=messageVide");
}
else
{

    $file = fopen("../FILES/MessagesCon.txt","a");
    fwrite($file,$_POST['messageCon']);
    fwrite($file,";");
    fwrite($file,$_POST['nameCon']);
    fwrite($file,";");
    fwrite($file,$_POST['emailCon']);
    fwrite($file,"\n");
    header("Location: ../contact.php");
}