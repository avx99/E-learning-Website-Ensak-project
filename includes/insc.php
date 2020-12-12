<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
 }

    // if(!isset($_POST['ins'])){
    //     die("Page inaccessible");
    // }


    $email = $error_email = $name = $error_name = $pass = $error_pass = 
    $confirm = $error_confirm = $sexe = $error_sexe = '';

    function validate_email($field)
    {
        if ($field == "") return "<br>Entrer votre email<br>";
        else if (!((strpos($field, ".") > 0) &&
                (strpos($field, "@") > 0)) ||
                preg_match("/[^a-zA-Z0-9.@_-]/", $field))
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

    function validate_username($field)
    {
        if ($field == "") return "<br>Entrer le nom<br>";
        else if (strlen($field) < 4)
        return "<br>Le nom doit contenir au moins 5 caracteres<br>";
        else if (preg_match("/[^a-zA-Z ]/", $field))
        return "<br>Le nom est invalide";
        return "";
    }

    // function validate_sexe($field)
    // {
    //     if($field != "homme" && $field != "femme")
    //         return "<br>Sexe invalide<br>";
    //     return "";
    // }


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $conn = mysqli_connect('localhost','root','','webprojet');
        // mysqli_select_db($conn, 'webprojet');

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $sexe = $_POST['sexe'];
        $confirm = $_POST['confirmpass'];

        $error_email = validate_email($email);
        $error_pass = validate_password($pass);
        $error_name = validate_username($name);
        // $error_sexe = validate_sexe($sexe);
        if($confirm == ''){
            $error_confirm = "<br>Confirmer le mot de pass";
        }
        elseif($confirm != $pass){
            $error_confirm = "<br>Les deux mots de sont differents";
        }

        $sql = "SELECT * FROM utilisateur WHERE email='$email'";
        $r = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($r);
        if($num == 1){
            $error_email = "<br> Email deja existe";
        }elseif($error_confirm =='' && $error_email =='' && $error_name =='' && $error_pass ==''){
            $s = "INSERT INTO utilisateur VALUES('id_user','$name','$email','$pass','$sexe')";
            mysqli_query($conn, $s);
            header('location:login.php');
        }else{
            
            session_unset();
            session_destroy();
        }
    }


?>