<?php


if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
 }
session_start();
// if(!isset($_POST['x'])){
//     die("Page inaccessible");
// }



echo '<script language="javascript">';
echo 'alert("Est ce que vous etes sur? cette tache va supprimer vous de site")';
echo '</script>';

$email = $_SESSION['email'];

$conn = mysqli_connect('localhost', 'root', '', 'webprojet');
$s = "DELETE FROM utilisateur WHERE email='$email'";

// echo '<script language="javascript">';
// echo 'alert("Votre compte est bien supprimer")';
// echo '</script>';

session_unset();
session_destroy();

header('Location: http://127.0.0.1/Projet%20Web%20Pr.Saadi/');
mysqli_query($conn, $s);
