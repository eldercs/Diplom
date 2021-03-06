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
$page_items = 9;
$resutl = mysqli_query($con, "SELECT COUNT(*) as cnt FROM `hotels`");
$items_count = mysqli_fetch_assoc($resutl)['cnt'];
$pages_count = ceil($items_count/ $page_items);
$offset = ($cur_page - 1) * $page_items;

$pages =  range(1,$pages_count);
$id = 0;
$id = $_GET['id'] ?? 0;
$idiser = 0;
$iduser = $_GET['iduser'] ?? 0; 
if($id){
    $cur_page = $_GET['page'] ?? 1;
    $page_items = 9;
    $resutl = mysqli_query($con, "SELECT COUNT(*) as cnt FROM `hotels` JOIN `category` WHERE `category_id` = '$_GET[id]' AND category.`id` = '$_GET[id]'");
    $items_count = mysqli_fetch_assoc($resutl)['cnt'];
    $pages_count = ceil($items_count/ $page_items);
    $offset = ($cur_page - 1) * $page_items;
    $pages =  range(1,$pages_count);

    $like_post = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`title_image`, `category` FROM hotels JOIN `category` WHERE `category_id` = '$_GET[id]' AND category.`id` = '$_GET[id]' ORDER BY `count_like` DESC LIMIT 0,3");

    $table_array = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`title_image`, `category` FROM hotels JOIN `category` WHERE `category_id` = '$_GET[id]' AND category.`id` = '$_GET[id]' ORDER BY hotels.id DESC LIMIT " . $page_items . " OFFSET " . $offset);
}
else{
    $like_post = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`title_image`, `category` FROM hotels JOIN `category` WHERE `category_id` = category.`id` ORDER BY `count_like` DESC LIMIT 0,3");

    $table_array = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`title_image`, `category` FROM hotels JOIN `category` WHERE `category_id` = category.`id` ORDER BY hotels.id  DESC LIMIT " . $page_items . " OFFSET " . $offset);
}
if($iduser){
    $cur_page = $_GET['page'] ?? 1;
    $page_items = 9;
    $resutl = mysqli_query($con, "SELECT COUNT(*) as cnt FROM `hotels` JOIN `users` WHERE `user_id` = '$_GET[iduser]' AND users.`id` = '$_GET[iduser]'");
    $items_count = mysqli_fetch_assoc($resutl)['cnt'];
    $pages_count = ceil($items_count/ $page_items);
    $offset = ($cur_page - 1) * $page_items;
    $pages =  range(1,$pages_count);
    $like_post = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`title_image`, `category` FROM hotels JOIN `category` JOIN `users`  WHERE `user_id` = '$_GET[iduser]' AND users.`id` = '$_GET[iduser]' AND `category_id` = category.`id` ORDER BY `count_like` DESC LIMIT 0,3");

    $table_array = fetchAll($con, "SELECT hotels.`id`,`title`, `price`, `city`, `description`, `user_id`, `count_like` ,`title_image`, `category` FROM hotels JOIN `category` JOIN `users` WHERE `user_id` = '$_GET[iduser]' AND users.`id` = '$_GET[iduser]' AND `category_id` = category.`id` ORDER BY hotels.id DESC LIMIT " . $page_items . " OFFSET " . $offset);
}
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
            'like_post' => $like_post,
            'pages' => $pages,
            'pages_count' => $pages_count,
            'cur_page' => $cur_page,
            'username' => $username,
            'id' => $id,
        ]
    );
    }
    else{
        $page_content = shablon(
            'index',
            [   
                'hidden' => $hidden,
                'table_array' => $table_array,
                'like_post' => $like_post,
                'pages' => $pages,
                'pages_count' => $pages_count,
                'cur_page' => $cur_page,
                'username' => $username,
                'id' => $id,
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
            'like_post' => $like_post,
            'pages' => $pages,
            'pages_count' => $pages_count,
            'cur_page' => $cur_page,
            'username' => $username,
            'id' => $id,
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
