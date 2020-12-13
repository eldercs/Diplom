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

//$sql = 'SELECT * FROM lots'. ' LIMIT ' . $page_items . ' OFFSET ' . $offset;

$table_array = fetchAll($con, "SELECT * FROM `hotels`  ORDER BY id DESC LIMIT " . $page_items . " OFFSET " . $offset);
$page_content = shablon(
    'index',
    [
        'table_array' => $table_array,
        'pages' => $pages,
        'pages_count' => $pages_count,
        'cur_page' => $cur_page
    ]
);
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
