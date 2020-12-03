<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($username == null){
    header("Location: /login.php");
    exit();
}
$category = fetchAll($con, 'SELECT * FROM `category`');
$page_content = shablon(
    'add',
    [   
        'category' => $category,
    ]
); 
echo shablon(
    'layout',
    [
        'username' => $username,
        'page_content' =>  $page_content, 
        'title' => 'Регистрация',
    ]
);
?>