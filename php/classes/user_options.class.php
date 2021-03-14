<?php   

include 'db_connections.class.php';

class user_options extends db_connections {

    public $user;
    public $password;
       
    public function create_user($email,$pwd){
        $this->user = $email;
        $this->password = $pwd;
        $connection = new db_connections();
        $resultq = $connection->register_user($this->user, $this->password);

        if ($resultq === false){
            return false;
        }else{
            return true;
        }
    }
}

?>