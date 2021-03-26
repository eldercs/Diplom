<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";

try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
$gifs = []; 
mysqli_query($con,"CREATE FULLTEXT INDEX gif_ft_search ON gifs(title,description)");
$search = (isset($_GET['search'] )) ? trim($_GET['search']) : null;
$search = mysqli_real_escape_string($con, $search);

mysqli_query($con,"CREATE FULLTEXT INDEX gif_ft_search2 ON gifs(price)");
$search_price = (isset($_GET['price_search'])) ? trim($_GET['price_search']) : null;
$search_price = mysqli_real_escape_string($con, $search_price);  
$search_price2 = (isset($_GET['price_search2'])) ? trim($_GET['price_search2']) : null;
$search_price2 = mysqli_real_escape_string($con, $search_price2);    
if(!empty($search)) {
    try {
        $hotels = fetchAll($con, "SELECT h.`id`, h.`title` ,`city`, `price`, `count_like`, `image`, `category` AS `category` FROM hotels h JOIN hotel_image ON hotel_image.`id_hotel` = h.`id` JOIN category c ON h.`category_id` = c.`id` WHERE (h.`title` LIKE '%$search%' OR `description` LIKE '%$search%') ORDER BY id DESC ");
    } catch (Exception $e) {
        renderErrorTemplate($e->getMessage(), $username);
    }
    $image = fetchOne($con, "SELECT *  FROM `hotel_image`");
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => $hotels,
        'image' => $image,
        'search' => $search
    ]);
}
else if(!empty($search_price) && !empty($search_price2)){
    try {
        $hotels = fetchAll($con, "SELECT h.`id`, h.`title` ,`city`, `price`, `count_like`, `image`, `category` AS `category` FROM hotels h JOIN hotel_image ON hotel_image.`id_hotel` = h.`id` JOIN category c ON h.`category_id` = c.`id`  WHERE (h.`price` >= $search_price AND h.`price` <= $search_price2) ORDER BY id DESC");
    } catch (Exception $e) {
        renderErrorTemplate($e->getMessage(), $username);
    }
    $image = fetchOne($con, "SELECT *  FROM `hotel_image`");
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => $hotels,
        'image' => $image,
        'search' => $search_price
    ]);
}
else if(!empty($search_price)){
    try {
        $hotels = fetchAll($con, "SELECT h.`id`, h.`title` ,`city`, `price`, `count_like`, `image`, `category` AS `category` FROM hotels h JOIN hotel_image ON hotel_image.`id_hotel` = h.`id` JOIN category c ON h.`category_id` = c.`id`  WHERE (h.`price` >= $search_price) ORDER BY id DESC");
    } catch (Exception $e) {
        renderErrorTemplate($e->getMessage(), $username);
    }
    $image = fetchOne($con, "SELECT *  FROM `hotel_image`");
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => $hotels,
        'image' => $image,
        'search' => $search_price
    ]);
}
else if(!empty($search_price2)){
    try {
        $hotels = fetchAll($con, "SELECT h.`id`, h.`title` ,`city`, `price`, `count_like`, `image`, `category` AS `category` FROM hotels h JOIN hotel_image ON hotel_image.`id_hotel` = h.`id` JOIN category c ON h.`category_id` = c.`id`  WHERE (h.`price` <= $search_price2) ORDER BY id DESC");
    } catch (Exception $e) {
        renderErrorTemplate($e->getMessage(), $username);
    }
    $image = fetchOne($con, "SELECT *  FROM `hotel_image`");
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => $hotels,
        'image' => $image,
        'search' => $search_price
    ]);
}
else {
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => null,
        'image' => null,
        'search' => $search
    ]);
}

/* if(!empty($search_price)) {
    try {
        $hotels = fetchAll($con, "SELECT h.`id`, h.`title` ,`city`, `price`, `count_like`, `image`, `category` AS `category` FROM hotels h JOIN hotel_image ON hotel_image.`id_hotel` = h.`id` JOIN category c ON h.`category_id` = c.`id`  WHERE (h.`price` LIKE '%$search_price%') ORDER BY id DESC");
    } catch (Exception $e) {
        renderErrorTemplate($e->getMessage(), $username);
    }
    $image = fetchOne($con, "SELECT *  FROM `hotel_image`");
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => $hotels,
        'image' => $image,
        'search' => $search_price
    ]);
} else {
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => null,
        'image' => null,
        'search' => $search_price
    ]);
}    */

echo shablon(
    'layout',
    [
        'my_array' => $my_array,
        'page_content' =>  $page_content, 
        'title' => 'Поиск',
        'username' => $username,
    ]
);

?>