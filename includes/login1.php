<?php
// if(!isset($_POST['log'])){
//     die("Page inaccessible");
// }

if(!isset($_SERVER['HTTP_REFERER'])){
   die("page inaccesible");
}



// var_dump($_POST);
$email = $pass = $email_error = $pass_error =  '';


function validate_email($field)
{
    if ($field == "") return "<br>Entrer votre email<br>";
    else if (
        !((strpos($field, ".") > 0) &&
            (strpos($field, "@") > 0)) ||
        preg_match("/[^a-zA-Z0-9.@_-]/", $field)
    )
        return "<br>L'email est invalide <br>";
    return "";
}

function validate_password($field)
{
    if ($field == "") return "<br>Entrer votre mot de pass<br>";
    else if (strlen($field) < 6)
        return "<br>Mot de pass doit contenir au moins 6 caracteres<br>";
    return "";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conn = mysqli_connect('localhost', 'root', '', 'webprojet');
    // mysqli_select_db($conn, 'webprojet');
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $email_error = validate_email($email);
    $pass_error = validate_password($pass);

    if ($email_error == '') {
        $_SESSION['email'] = $email;
    }

    $sql = "SELECT * FROM utilisateur WHERE email='$email' AND password='$pass'";

    $r = mysqli_query($conn, $sql);
    $l = mysqli_fetch_assoc($r);

    session_start();



    $num = mysqli_num_rows($r);

    if ($num == 1) {

        $_SESSION['nom'] = $l['nom'];
        $_SESSION['sexe'] = $l['sexe'];
        $_SESSION['email'] = $email;
        header('Location: ../Projet%20Web%20Pr.Saadi/accueil.php');
    } elseif ($pass_error == '' || $email_error == '') {
        if ($pass_error == '') {
            $pass_error .= "<br> Verifier le mot de pass";
        } else {
            $email_error .= "<br> Verifier votre email";
        }
        session_unset();
        session_destroy();
    }
}
