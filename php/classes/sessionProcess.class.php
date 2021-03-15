<?php

class sessionProcess{
    
    public function sessionActive(){
        session_start();
        if(!isset($_SESSION["user_active"])){
            $sessionInfo = array(0, 'index.html', 'LogIn');
        } else {
            $userActive = $_SESSION["user_active"];
            $sessionInfo = array(1, 'dashboard.html',$userActive);
        }
        
        echo json_encode($sessionInfo);
    }

    public function sessionKill(){
        session_start();
        if (isset($_SESSION["user_active"])){
            unset($_SESSION["user_active"]);
            session_destroy();
        }

        echo true;

    }
}