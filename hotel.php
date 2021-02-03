<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
//require_once "comments.php";
//$key = $_GET['key'] ?? null;
$lot_id = $_GET['key'] ?? null;
$key = $_GET['key'] ?? null;
try {
    $table_array = fetchAll($con, "SELECT * FROM `hotels` ");
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
    $comments = fetchAll($con, 'SELECT *  FROM `comments`');

} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}

$page_content = shablon(
    'hotel',
    [
        'key' => $key, 
        'table_array' => $table_array,
        'comments' => $comments,
        'username' => $username,
    ]
);
echo shablon(
    'layout',
    [
        'page_content' =>  $page_content,
        'my_array' => $my_array,
        'title' => htmlspecialchars($table_array[$key]['title']),
        'username' => $username,
    ]
);


?>