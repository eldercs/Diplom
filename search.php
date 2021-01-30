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
$search = (isset($_GET['search'])) ? trim($_GET['search']) : null;
$search = mysqli_real_escape_string($con, $search);
if($search) {
    try {
        $hotels = fetchAll($con, "SELECT h.`id`, h.`title`, `img`,`city`, `price`,`like`, c.`title` AS `category` FROM hotels h JOIN category c ON h.`category_id` = c.`id` WHERE (h.`title` LIKE '%$search%' OR `description` LIKE '%$search%')   ORDER BY id DESC");
    } catch (Exception $e) {
        renderErrorTemplate($e->getMessage(), $username);
    }

    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => $hotels,
        'search' => $search
    ]);
} else {
    $page_content = shablon('search', [
        'my_array' => $my_array,
        'hotels' => null,
        'search' => $search
    ]);
}

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