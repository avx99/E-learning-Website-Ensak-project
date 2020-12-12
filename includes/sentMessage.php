<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
 }


if(empty($_POST['sentMessage']) || empty($_POST['sentEmail']))
{
    header("Location: ../".$_POST['sentMsg']."?error=messageVide");
}
else
{

    $file = fopen("../FILES/Messages.txt","a");
    fwrite($file,$_POST['sentMessage']);
    fwrite($file,";");
    fwrite($file,$_POST['sentEmail']);
    fwrite($file,"\n");
    header("Location: ../".$_POST['sentMsg']);
}