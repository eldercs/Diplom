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

$page_content = shablon(
    'index',
    [
        '' => ''
    ]
);
echo shablon(
    'layout',
    [
        'username' => $username,
        'page_content' =>  $page_content,
        'title' => 'Главная',
    ]
);
?>
