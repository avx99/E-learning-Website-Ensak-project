<?php

    if(!session_id() == '') {
        $email = $_SESSION['email'];
        if(!empty($email)){ 
            $email =  $_SESSION['email'];
            $conn = mysqli_connect('localhost','root','','webprojet');
            $sql = "SELECT * from utilisateur WHERE email='$email';";
            $r = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($r);
            $data = mysqli_fetch_assoc($r);
            $id = $data['id_user'] ;
            $name = $data['nom'] ;
            $password = $data['password'];
            $sexe = $data['sexe'];
        }
    }
?>