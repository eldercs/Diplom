<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";

//$key = $_GET['key'] ?? null;
//$lot_id = $_GET['key'] ?? null;
$key = $_GET['key'] ?? null;
$lotId = (isset($_GET['key'])) ? intval($_GET['key']) : null;
$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pos = $_POST;
   // print_r($pos);
    $id = $pos['page_id'];
    $requared = ['title', 'description', 'city'];
    $is_numeric = [
        'price',
    ];
    $image = ['img','img2','img3', 'img4','img5'];
    foreach($requared as $name){
        if (!array_key_exists($name, $pos) || empty($pos[$name])) {
            $errors[$name] = 'Это поле надо заполнить';
            print($name);
        }
    } 
    foreach($is_numeric as $name){
        if(!is_numeric($pos[$name]) || intval($pos[$name]) <= 0){
            $errors[$name] = 'Введите число больше нуля';
           /*  print($errors[$name]); */
            print($name);
        }
    }
foreach($image as $img){
    if (!empty($_FILES[$img]['name'])) {
    
        $tmpName = $_FILES[$img]['tmp_name'];
        $folder = 'img/uploads/';
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $path = $folder . time() . $_FILES[$img]['name'];
        $fileType = mime_content_type($tmpName);
        if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
            $errors[$img] = 'Загрузите картинку в формате jpg или png';
        } else {
            move_uploaded_file($tmpName, $path);
            $pos[$img] = $path;
        }
    } 
} 
    if(count($errors)){
        print(count($errors));
        //header("Location: /index.php");
    }
    else{
        /* $pos = array_map('htmlspecialchars', $pos);
        $sql = "UPDATE INTO hotels  (`title`,  `price`, `city` , `description`) WHERE h.`id` = '$lotId'";
        $add_st = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($add_st,'siss', $pos['title'], $pos['price'],$pos['city'], $pos['description']);
        mysqli_stmt_execute($add_st); */
        // $sql = "UPDATE hotels SET `user_id` = $add_st, `title` = $pos['title'], `category_id` = $pos['category'], `price` = $pos['price'], `city` = $pos['city'], `description` = $pos['description'], `title_image` = $pos['img'], `count_like` = 0 WHERE (id = $pos['id'])";
        $pos = array_map('htmlspecialchars', $pos);
        if(!empty($_FILES['img']['name'])){
            $sql = mysqli_query($con, "UPDATE hotels SET `title` = '$pos[title]', `price` = '$pos[price]', `description` = '$pos[description]', `city` = '$pos[city]',  `title_image` = '$pos[img]'  WHERE `id` = $id ");
         //  $sql = mysqli_query($con, "UPDATE hotel_image SET `image` = '$pos[image]',   WHERE `id_hotel` = $id ");
         //print_r($pos);
        $hotel_id = mysqli_query($con, 'SELECT `id` FROM `hotels` ORDER BY id DESC LIMIT 1');
        $hotel_id = mysqli_fetch_assoc($hotel_id);
        $hotel_id = $hotel_id['id'];
         $sql = "INSERT INTO `hotel_image` (`id_hotel`, `image`, `image2`, `image3`, `image4`) VALUES (?, ?, ?, ?, ?)";
         $add_st = mysqli_prepare($con, $sql);
         mysqli_stmt_bind_param($add_st,'issss', $hotel_id, $pos['img2'], $pos['img3'], $pos['img4'], $pos['img5']);
         mysqli_stmt_execute($add_st);
        }
        else{
            $sql = mysqli_query($con, "UPDATE hotels SET `title` = '$pos[title]', `price` = '$pos[price]', `description` = '$pos[description]', `city` = '$pos[city]' WHERE `id` = $id ");
        }
        header("Location: /index.php");
    }
}
