<?php


if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
 }
    session_start();
    // if(!isset($_POST['x'])){
    //     die("Page inaccessible");
    // }

    $email = $error_email = $name = $error_name = $pass = $error_pass = 
    $confirm = $error_confirm = $sexe = $error_sexe = '';


    function validate_password($field)
    {
        if ($field == "") return "<br>Entrer votre mot de pass<br>";
        else if (strlen($field) < 6)
        return "<br>Mot de pass doit contenir au moins 6 caracteres<br>";
        return "";
    }

    function validate_username($field)
    {
        if ($field == "") return "<br>Entrer le nom<br>";
        else if (strlen($field) < 4)
        return "<br>Le nom doit contenir au moins 5 caracteres<br>";
        else if (preg_match("/[^a-zA-Z ]/", $field))
        return "<br>Le nom est invalide";
        return "";
    }


    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $conn = mysqli_connect('localhost','root','','webprojet');

        $email = $_SESSION['email'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $sexe = $_POST['sexe'];
        $confirm = $_POST['confirmpass'];

        $error_pass = validate_password($pass);
        $error_name = validate_username($name);
        if($confirm == ''){
            $error_confirm = "<br>Confirmer le mot de pass";
        }
        elseif($confirm != $pass){
            $error_confirm = "<br>Les deux mots de sont differents";
        }
        elseif($error_confirm =='' && $error_name =='' && $error_pass ==''){
            $s = "UPDATE utilisateur SET nom='$name' , sexe='$sexe' , password='$pass' WHERE email='$email'";
            mysqli_query($conn, $s);

            //   echo '<script language="javascript">';
            //   echo 'alert("Vos donnes sont bien modifies")';
            //   echo '</script>';
            header('Location: http://127.0.0.1/Projet%20Web%20Pr.Saadi/profile.php');
        }else{
            
            session_unset();
            session_destroy();
        }
    

    }


