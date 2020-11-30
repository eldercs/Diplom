<?php
require_once 'functions.php';
require_once "init.php";

$page_content = shablon(
    'add',
    [   
        '' => ''
    ]
); 
echo shablon(
    'layout',
    [
        'page_content' =>  $page_content, 
        'title' => 'Регистрация',
    ]
);
?>