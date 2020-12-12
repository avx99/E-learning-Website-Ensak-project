<?php

if(!isset($_SERVER['HTTP_REFERER'])){
   die("page inaccesible");
}
    session_start();
    session_destroy();
    unset($_SESSION['email']);
    header('location: http://127.0.0.1/Projet%20Web%20Pr.Saadi/');
?>