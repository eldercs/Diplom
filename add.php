<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($username == null){
    header("Location: /login.php");
    exit();
}
$page_content = shablon(
    'add',
    [   
        '' => ''
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