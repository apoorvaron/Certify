<?php
    session_start();
    // session_unset();
    // session_destroy();
    // $username = $_GET['username'];
    #
    // $uno = $_GET['uno'];
    // $_SESSION["".$username.""]="";
    $_SESSION["auth"]=false;
    $_SESSION["email"]="";
    // echo "......";
    // echo  $_SESSION["".$username.""];
    // setcookie('usernamecookie','',time()-86400);
    // setcookie('passwordcookie','',time()-86400);
    header('location: ../');
?>