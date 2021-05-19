<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($username['role'] != 3){
    header("Location: /");
    exit();
}
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $idH = $_POST;
    $delete_user = (int)$idH['delete'];
    

    $sql = mysqli_query($con,"SELECT count(*) FROM `users` WHERE id = $delete_user") or die(mysqli_error()); 
    $result = mysqli_fetch_row($sql);
    if($result[0] > 0){
        mysqli_query($con,"DELETE FROM `users` WHERE id = $delete_user"); 
    }
    header("Location: /list_users.php");
}
$list_users = fetchAll($con, "SELECT * FROM `users` WHERE `id` != '$username[id]'");
$page_content = shablon(
    'list_users',
    [   
        'list_users' => $list_users
    ]
); 
echo shablon(
    'layout',
    [
        'my_array' => $my_array,
        'username' => $username,
        'page_content' =>  $page_content, 
        'title' => 'Список пользователей',
    ]
);
?>