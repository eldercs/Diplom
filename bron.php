<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
$page_content = shablon(
    'bron',
    [   
    ]
); 
echo shablon(
    'layout',
    [
        'my_array' => $my_array,
        'username' => $username,
        'page_content' =>  $page_content, 
        'title' => 'Добавление объявления',
    ]
);
?>