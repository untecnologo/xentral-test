<?php

include "../classes/db_connections.php";
include "../classes/user_options.php";
include "../classes/validations.php";

readline('Welcome, CLI to create a new user');

$user = "";
$status = true;
$valid_user = new validations();


while ($status){

    while ($user === "") {
    
        $user = readline('Insert a valid email: ');
        
        $user_valid = $valid_user->email_validation($user);
        
        if ($user_valid === false){
    
            $user = "";
        } else{
            $pss = readline('Insert a password: ');
        }
    }
    
    $user_data = new user_act($user, $pss);
    
    $process_result = $user_data->create_user();
    
    if($process_result){
        $status = false;
    } else{
        realine('There was a problem creating your user');
    }
} 
//
exit(readline('Bye'));

?>