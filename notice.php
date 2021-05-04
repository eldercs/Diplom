<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
    $notice = fetchAll($con, "SELECT bron.`id`, `id_user`, hotels.`title`,`id_hotel`,`telephone`, bron.`surname`, bron.`name`, bron.`patronymic` FROM `bron` JOIN `users` ON `id_user` = users.`id` JOIN `hotels` ON `id_hotel` = hotels.`id` WHERE $username[id] = hotels.`user_id`");
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
$page_content = shablon(
    'notice',
    [
        'notice' => $notice,
    ]
);
echo shablon(
    'layout',
    [
        'page_content' =>  $page_content,
        'my_array' => $my_array,
        'title' => 'Уведомления ',
        'username' => $username,
    ]
);
?>