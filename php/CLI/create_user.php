<?php
require "../classes/user_options.php";
require "../classes/validations.php";

// readline('Create a New User');

// $user_val = readline('Insert a Valid Email: '); 
// $pass_val = readline('Insert a Password: '); 

// $user_pro =  new user_exe($user_value, $pass_value);

// $user_valid = $user_pro->create_user();

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