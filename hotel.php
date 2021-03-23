<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
//require_once "comments.php";
//$key = $_GET['key'] ?? null;
//$lot_id = $_GET['key'] ?? null;
$key = $_GET['key'] ?? null;
$lotId = (isset($_GET['key'])) ? intval($_GET['key']) : null;
try {
    //$table_array = fetchAll($con, "SELECT * FROM `hotels` ");
    //$lot = fetchOne($con, "SELECT l.`title`, `img`, `description`, `price`, `end_date`, `bet_step`, `user_id`, c.`title` AS `category` FROM lots l JOIN categories c ON l.`category_id` = c.`id` WHERE `winner_id` IS NULL AND l.`id` = '$lotId'");
    $table_array = fetchOne($con, "SELECT h.`id`, h.`title`, `price`, `city`, `description`, `user_id`,  category.`title` AS `category` FROM hotels h JOIN category ON h.`category_id` = category.`id` WHERE  h.`id` = '$lotId'");
    $image = fetchOne($con, "SELECT *  FROM `hotel_image` WHERE hotel_image.`id_hotel` = '$lotId' ");
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
    $comments = fetchAll($con, "SELECT *  FROM `comments` WHERE comments.`hotel_id` = '$lotId'");

} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}

$page_content = shablon(
    'hotel',
    [
        'image' => $image,
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
        'title' => 'Просмотр номера ' . $table_array['title'],
        'username' => $username,
    ]
);


?>