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
    $table_array = fetchOne($con, "SELECT h.`id`, h.`title`, `price`, `city`, `description`, `user_id`, `title_image`, category.`category` AS `category` FROM hotels h JOIN category ON h.`category_id` = category.`id` WHERE  h.`id` = '$lotId'");
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');

} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pos = $_POST;
    $requared = ['title', 'category', 'description', 'city'];
    $is_numeric = [
        'price',
    ];
    foreach($requared as $name){
        if (!array_key_exists($name, $pos) || empty($pos[$name])) {
            $errors[$name] = 'Это поле надо заполнить';
            print($name);
        }
    } 
    foreach($is_numeric as $name){
        if(!is_numeric($pos[$name]) || intval($pos[$name]) <= 0){
            $errors[$name] = 'Введите число больше нуля';
            print($errors[$name]);
            print($name);
        }
    }
    if (!empty($_FILES['img']['name'])) {
    
        $tmpName = $_FILES['img']['tmp_name'];
        $folder = 'img/uploads/';
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $path = $folder . time() . $_FILES['img']['name'];
        $fileType = mime_content_type($tmpName);
        if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
            $errors['img'] = 'Загрузите картинку в формате jpg или png';
        } else {
            move_uploaded_file($tmpName, $path);
            $pos['img'] = $path;
        }
    } else {
        $errors['img'] = 'Вы не загрузили файл';
    }
    if(count($errors)){
        $page_content = shablon('editor',
        [
            'errors' => $errors,
            'my_array' => $my_array,
        ]);
    }
    else{
        $pos = array_map('htmlspecialchars', $pos);
        $sql = "INSERT INTO `hotels` (`user_id`, `title`, `category_id`, `price`, `city`, `description`,`title_image`, `count_like`) VALUES ('$username[id]', ?, ?, ?, ?, ?, ?,'0')";
        $add_st = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($add_st,'ssisss', $pos['title'], $pos['category'], $pos['price'],$pos['city'], $pos['description'], $pos['img']);
        mysqli_stmt_execute($add_st);
        header("Location: " .$_SERVER["HTTP_REFERER"]);
    }
}
$page_content = shablon(
    'editor',
    [
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