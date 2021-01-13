<?php


if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
}

$dbserver = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "webProjet";

$conn = mysqli_connect($dbserver, $dbusername, $dbpass, $dbname);

function addUser($email, $name, $password, $sexe)
{
    global $conn;

    if(empty($email) || empty($name) || empty($password) || empty($sexe))
    {
        die("impossible de inserer un champ vide");
    }

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM utilisateur WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        die("ce email est deja existe ,impossible de l'ajouter<br>");
    }
    

    $sql = "INSERT INTO utilisateur VALUES ('id_user', '$name', '$email', '$password' ,'$sexe')";
    if (mysqli_query($conn, $sql)) {
        echo "Un nouveau utilisateur a bien ajoute dans votre base de donne";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}


function deleteUser($email)
{
    global $conn;
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(empty($email))
    {
        die("impossible de supprimer par un email vide");
    }

    $sql = "SELECT * FROM utilisateur WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_num_rows($result) > 0) {
        die("ce email n'existe pas <br>");
    }

    $sql = "DELETE FROM utilisateur WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        echo "Un utilisateur a bien supprimer de votre base de donne";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}


function updateUser($email, $name, $password, $sexe)
{
    global $conn;
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(empty($email) || empty($name) || empty($password) || empty($sexe))
    {
        die("impossible de modifier par un champ vide");
    }

    $sql = "UPDATE utilisateur SET nom='$name' ,password='$password' ,sexe='$sexe' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        echo "Un utilisateur a bien modifier dans votre base de donne";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}



function userAdminstration()
{
    if (isset($_POST['nomAdd']) && isset($_POST['emailAdd']) && isset($_POST['password1Add']) && isset($_POST['password2Add'])) {
        if ($_POST['password1Add'] == $_POST['password2Add']) {
            addUser($_POST['emailAdd'], $_POST['nomAdd'], $_POST['password1Add'], $_POST['sexeAdd']);
            return;
        }
    }
    if (isset($_POST['nomMod']) && isset($_POST['emailMod']) && isset($_POST['password1Mod']) && isset($_POST['password2Mod'])) {
        if ($_POST['password1Mod'] == $_POST['password2Mod']) {
            updateUser($_POST['emailMod'], $_POST['nomMod'], $_POST['password1Mod'], $_POST['sexeMod']);
            return;
        }
    }
    if (isset($_POST['emailDel'])) {
        deleteUser($_POST['emailDel']);
        return;
    }
}
// var_dump($_POST);
userAdminstration();
// header("Location : ../admin.php");
