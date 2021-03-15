<?php
include '../classes/sessionProcess.class.php';

$functionRun = $_POST['run'];

if ($functionRun == "validation"){
    $functionProcess = new sessionProcess();
    $result_process = $functionProcess->sessionActive();
    echo $result_process;
}

if ($functionRun == "logout"){
    $functionProcess = new sessionProcess();
    $result_process = $functionProcess->sessionKill();
    echo $result_process;
}