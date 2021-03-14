<?php   
require_once 'db_connections.php';

class user_act extends db_conn{

    private $user;
    private $password;

    function __construct ($user, $password){
        $this->user = $user;
        $this->password = $password;
    }

       
    function create_user(){

      
                
    }

    function __destruct() {
        echo "The fruit is {$this->name}.";
      }
}

?>