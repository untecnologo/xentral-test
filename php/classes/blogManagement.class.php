<?php
include 'dbConnections.class.php';

class blogManagement extends dbConnections {

    public $title;
    public $author;
    public $text;
       
    public function registerPost($title, $author, $text){
        $this->title = $title;
        $this->author = $author;
        $this->text = $text;
        $connection = new dbConnections();
        $resultq = $connection->registerDBPost($this->title, $this->author, $this->text);

        if ($resultq === false){
            return false;
        }else{
            return true;
        }
    }

    public function showList(){
        $connection = new dbConnections();
        $resultq = $connection->listedPost();
        echo $resultq;
    }
}

?>