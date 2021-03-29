<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";

function sum_price($price){
    $price = ceil($price);
    if($price>1000){
        $new_price = number_format($price, 0, ',', ' ');
    }
    else{
        $new_price = $price;
    }
    return $new_price."₽";
}
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
$cur_page = $_GET['page'] ?? 1;
$page_items = 3;
$resutl = mysqli_query($con, "SELECT COUNT(*) as cnt FROM `hotels`");
$items_count = mysqli_fetch_assoc($resutl)['cnt'];
$pages_count = ceil($items_count/ $page_items);
$offset = ($cur_page - 1) * $page_items;

$pages =  range(1,$pages_count);
/* $image = fetchAll($con, 'SELECT `id`,`image` FROM `hotel_image`'); */

$table_array = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`title_image` FROM hotels ORDER BY hotels.id DESC LIMIT " . $page_items . " OFFSET " . $offset);
//$table_array = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`image` FROM hotels JOIN hotel_image WHERE hotel_image.`id_hotel` = hotels.`id`  ORDER BY hotels.id DESC LIMIT " . $page_items . " OFFSET " . $offset);
$hidden = "visually-hidden";
if($username){
    //echo($username[id]);
    $sql = mysqli_query($con,"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id]") or die(mysqli_error()); 
    $result = mysqli_fetch_row($sql);
    if($result[0] > 0){
    $page_content = shablon(
        'index',
        [   
            'hidden' => "",
            'table_array' => $table_array,
            //'table_array2' => $table_array2,
            'pages' => $pages,
            'pages_count' => $pages_count,
            'cur_page' => $cur_page,
            'username' => $username,
        ]
    );
    }
    else{
        $page_content = shablon(
            'index',
            [   
                'hidden' => $hidden,
                'table_array' => $table_array,
                'pages' => $pages,
                'pages_count' => $pages_count,
                'cur_page' => $cur_page,
                'username' => $username,
            ]
        );
    }
}
else{
    $page_content = shablon(
        'index',
        [   
            'hidden' => $hidden,
            'table_array' => $table_array,
            'pages' => $pages,
            'pages_count' => $pages_count,
            'cur_page' => $cur_page,
            'username' => $username,
        ]
    );
}

echo shablon(
    'layout',
    [
        'my_array' => $my_array,
        'username' => $username,
        'page_content' =>  $page_content,
        'title' => 'Главная',
    ]
);
?>
