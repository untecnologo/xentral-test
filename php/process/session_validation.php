<?php
session_start();
$se = session_status();

if( $se = 2){
    $logedin = $_SESSION["user_active"];
    echo $logedin;
} else{
    echo "Please login";
}

