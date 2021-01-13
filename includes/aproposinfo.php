<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
    die("page inaccesible");
}

session_start();
if (isset($_SESSION['email'])) {
    $email =  $_SESSION['email'];
    $conn = mysqli_connect('localhost', 'root', '', 'website');
}

$id = $e = $name = $password = '';

if (!empty($email)) {
    $sql = "SELECT * from utilisateur WHERE email='$email';";
    $r = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($r);
    $data = mysqli_fetch_assoc($r);
    $id = $data['id_user'];
    $name = $data['nom'];
    $e = $data['email'];
    $password = $data['password'];
}
