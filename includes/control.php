<?php

// if(!isset($_SERVER['HTTP_REFERER'])){
//     die("page inaccesible");
// }

    //session_start();
    if(session_id() == '') {
        session_start();
    }
    if(isset($_SESSION['email'])){
        $s = true;
    }else{
        session_destroy();
        header('location:index.php');
    }
?>