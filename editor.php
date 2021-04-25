<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";

$key = $_GET['key'] ?? null;
$lotId = (isset($_GET['key'])) ? intval($_GET['key']) : null;
try {
    $table_array = fetchOne($con, "SELECT h.`id`, h.`title`, `price`, `city`, `description`, `user_id`, `title_image`, category.`category` AS `category` FROM hotels h JOIN category ON h.`category_id` = category.`id` WHERE  h.`id` = '$lotId'");
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
    $hotel_image = fetchOne($con, "SELECT `image2`,`image3`,`image4`, `image5` FROM `hotel_image` WHERE `id_hotel` = '$lotId'");

} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}

$page_content = shablon(
    'editor',
    [
        'hotel_image' => $hotel_image,
        'key' => $key, 
        'table_array' => $table_array,
        'username' => $username,
    ]
);
echo shablon(
    'layout',
    [
        'page_content' =>  $page_content,
        'my_array' => $my_array,
        'title' => 'Редактирование номера ' . $table_array['title'],
        'username' => $username,
    ]
);