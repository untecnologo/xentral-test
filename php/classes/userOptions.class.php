<?php   

include 'dbConnections.class.php';

class userOptions extends dbConnections {

    public $user;
    public $password;
       
    public function createUser($email,$pwd){
        $this->user = $email;
        $this->password = $pwd;
        $connection = new dbConnections();
        $resultq = $connection->registerUser($this->user, $this->password);

        if ($resultq === false){
            return false;
        }else{
            return true;
        }
    }

    public function login($email, $pwd){
        $this->user = $email;
        $this->password = $pwd;
        $connection = new dbConnections();
        $resultq = $connection->loginProcess($this->user, $this->password);

        if($resultq == true){
           
            return true;
        } else{
            return false;
        }
    }
}

?>