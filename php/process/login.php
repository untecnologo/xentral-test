<?php
include '../classes/user_options.class.php';

$user = $_POST['user'];
$pss = $_POST['password'];


$login = new user_options();
$login_result = $login->login($user, $pss);

if ($login_result == false){
    $login_process = array (0, "User or Password Wrong");
    echo json_encode($login_process);
}else{
    session_start();
    $_SESSION["user_active"] = $user;
    $login_process = array(1,"dashboard.html");
    echo json_encode($login_process);
}

