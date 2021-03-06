<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";

$key = $_GET['key'] ?? null;
$lotId = (isset($_GET['key'])) ? intval($_GET['key']) : null;
try {
 
    $table_array = fetchOne($con, "SELECT h.`id`, h.`title`, `price`, `city`, `description`, `user_id`, `title_image`, category.`category` AS `category` FROM hotels h JOIN category ON h.`category_id` = category.`id` WHERE  h.`id` = '$lotId'");
    $image = fetchOne($con, "SELECT *  FROM `hotel_image` WHERE hotel_image.`id_hotel` = '$lotId' ");
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
    $comments = fetchAll($con, "SELECT *  FROM `comments` WHERE comments.`hotel_id` = '$lotId'");
    $hotel_image = fetchOne($con, "SELECT `image2`,`image3`,`image4`, `image5` FROM `hotel_image` WHERE `id_hotel` = '$lotId'");
/*      print_r($hotel_image);  */
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}

$page_content = shablon(
    'hotel',
    [
        'image' => $image,
        'key' => $key, 
        'table_array' => $table_array,
        'hotel_image' => $hotel_image,
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