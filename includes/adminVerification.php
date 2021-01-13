<?php

if(!isset($_SERVER['HTTP_REFERER']) || !isset($_POST['username']) || !isset($_POST['password'])){
    die("page inaccesible");
}


if($_POST['username'] == "admin" && $_POST['password'] == "admin"){
    header('Location: http://127.0.0.1/Projet%20Web%20Pr.Saadi/includes/admin.php');
}

else{
    die("username ou password inccorect");
}