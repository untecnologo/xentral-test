<?
 class db_conn {
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "xentral_test";

    protected $conn = null;

    protected function connect_db(){
        $this->conn = mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            echo "Fail".$this->conn->connect_error;
        } else {
        
            echo "Connection Done!";
        }
    }
}

echo ('Incluido');

?>