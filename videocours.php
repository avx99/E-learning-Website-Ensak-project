<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
}

   session_start();
   $url = $_SERVER['HTTP_REFERER'];
   $arr = explode('=',$url);
   $id = $arr[1];
   header('location:courses.php?id='.$id);
?>