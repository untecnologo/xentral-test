<?php

include '../classes/blogManagement.class.php';

$action = $_POST['run'];

if ($action == "registerPost"){

$title =$_POST['title'];
$author = $_POST['author'];
$text = $_POST['content'];

    $postManage = new blogManagement();

    $postResult = $postManage->registerPost($title, $author, $text);

    if ($postResult == true){
        echo "!Published";
    }
}

if ($action == "showList"){
    $postView = new blogManagement();
    $viewResult = $postView->showList();
    echo $viewResult;
}