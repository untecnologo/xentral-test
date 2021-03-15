<?php
include '../classes/userOptions.class.php';

$user = $_POST['user'];
$pss = $_POST['password'];


$login = new userOptions();
$loginResult = $login->login($user, $pss);

if ($loginResult == false){
    $loginProcess = array (0, "User or Password Wrong");
    echo json_encode($loginProcess);
}else{
    session_start();
    $_SESSION["user_active"] = $user;
    $loginProcess = array(1,"dashboard.html");
    echo json_encode($loginProcess);
}

