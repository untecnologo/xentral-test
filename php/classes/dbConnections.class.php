<?php
 class dbConnections {
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

    protected function registerUser($userParameter, $pswParameter){
        $pdoUpdated = $this->connect();
        $stmt = $pdoUpdated->prepare("SELECT email FROM users WHERE email = :email_user");
        $stmt->bindParam(':email_user', $userParameter);
        $stmt->execute();

        if ($stmt->rowCount()>0){
            
            $this->dropConnect($pdoUpdated, $stmt);
            return false;
        } else {
            $stmt = $pdoUpdated->prepare("INSERT INTO users (email, password) VALUES (:email_user, :password_user)");
            $hashedPassword = password_hash($pswParameter, PASSWORD_DEFAULT);
            $stmt->bindParam('email_user', $userParameter);
            $stmt->bindParam('password_user', $hashedPassword);
            $stmt->execute();

            $this->dropConnect($pdoUpdated, $stmt);
            return true;
        }
    }

    protected function loginProcess($userParameter, $pswParameter){
        $pdoUpdated = $this->connect();
        $stmt = $pdoUpdated->prepare("SELECT * FROM users WHERE email = :email_user");
        $stmt->bindParam(':email_user', $userParameter);
        $stmt->execute();
        if ($stmt->rowCount()>0){
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            $hashPwd = $result['password'];
            $hash = password_verify($pswParameter,$hashPwd);

            if($hash){
                return $hash;
            }
        } else{
            return false;
        }
    }

    protected function registerDBPost($titleParameter, $authorParameter, $textParameter){
        $pdoUpdated = $this->connect();
        $stmt = $pdoUpdated->prepare("INSERT INTO blog_post (title, author, text, time_post) VALUES (:titlePost, :authorPost,:texPost, :timePost)");
        $stmt->bindParam(':titlePost', $titleParameter);
        $stmt->bindParam(':authorPost', $authorParameter);
        $stmt->bindParam(':texPost', $textParameter);  
        $sDate = date("Y-m-d H:i:s");
        $stmt->bindParam(':timePost', $sDate);
        $stmt->execute();

            $this->dropConnect($pdoUpdated, $stmt);
            return true;
    }

    protected function listedPost(){
        $pdoUpdated = $this->connect();
        $stmt = $pdoUpdated->prepare("SELECT * FROM blog_post");
        $stmt->execute();

        $resultQuery = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        echo json_encode($resultQuery);
    }
    


    protected function dropConnect($pdo, $stmt){
        $pdo = null;
        $stmt =null;
    }


}