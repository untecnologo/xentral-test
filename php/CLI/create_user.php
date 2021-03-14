<?php
include '../classes/validations.class.php';
include '../classes/user_options.class.php';


readline('Welcome, CLI to create a new user');

$valid_user = new validations();

$user = "";

while ($user == ""){
    $user = readline('Insert a valid email: ');
        
    $user_valid = $valid_user->email_validation($user);
    
    if ($user_valid == false){
        readline('Email is not valid');
        $user = "";
    } else{
        $pss = readline('Insert a password: ');
    }
}
    
    $user_data = new user_options();
    $process_result = $user_data->create_user($user,$pss);

    if($process_result === true){
        readline('User created succesfully');
    } else{
        readline('There was a problem creating your user, It is possible that the Email is already registered, please try again');
    }
//
exit(readline('Bye'));

?>