<?php
 class db_connections {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "xentral_test";

    protected function connect(){
        
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        try {

            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connected successfully";
        } catch(PDOException $e) {
           // echo "Connection failed: " . $e->getMessage();
        } 
        
        return $pdo;
    }

    protected function register_user($user_parameter, $psw_parameter){
        $pdo_updated = $this->connect();
        $stmt = $pdo_updated->prepare("SELECT email FROM users WHERE email = :email_user");
        $stmt->bindParam(':email_user', $user_parameter);
        $stmt->execute();

        if ($stmt->rowCount()>0){
            
            $this->drop_connect($pdo_updated, $stmt);
            return false;
        } else {
            $stmt = $pdo_updated->prepare("INSERT INTO users (email, password) VALUES (:email_user, :password_user)");
            $stmt->bindParam('email_user', $user_parameter);
            $stmt->bindParam('password_user', $psw_parameter);
            $stmt->execute();

            $this->drop_connect($pdo_updated, $stmt);
            return true;
        }
    }

    protected function drop_connect($pdo, $stmt){
        $pdo = null;
        $stmt =null;
    }


}