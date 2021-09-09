<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";


$key = $_GET['key'] ?? null;
$lotId = (isset($_GET['key'])) ? intval($_GET['key']) : null;
$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pos = $_POST;

    $id = $pos['page_id'];
    $requared = ['title', 'description', 'city'];
    $is_numeric = [
        'price',
    ];
    $image = ['image','image2','image3','image4','image5'];
    foreach($requared as $name){
        if (!array_key_exists($name, $pos) || empty($pos[$name])) {
            $errors[$name] = 'Это поле надо заполнить';
            print($name);
        }
    } 
    foreach($is_numeric as $name){
        if(!is_numeric($pos[$name]) || intval($pos[$name]) <= 0){
            $errors[$name] = 'Введите число больше нуля';

            print($name);
        }
    }

$hotel_image = mysqli_query($con, "SELECT `image2`, `image3`, `image4`, `image5` FROM `hotel_image` WHERE `id_hotel` = $id ");
$hotel_image = mysqli_fetch_assoc($hotel_image);
//$hotel_title = mysqli_fetch_assoc($hotel_title);
//print_r($hotel_image);
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
    else if($img != 'image'){
        $pos[$img] = $hotel_image[$img];
        /* $pos[$img] = $hotel_title[$img]; */
    } 
} 
//print_r( $pos);
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
        if(!empty($_FILES['image']['name'])){
            $sql = mysqli_query($con, "UPDATE hotels SET `title` = '$pos[title]', `price` = '$pos[price]', `description` = '$pos[description]', `city` = '$pos[city]',  `title_image` = '$pos[image]'  WHERE `id` = $id ");
         //  $sql = mysqli_query($con, "UPDATE hotel_image SET `image` = '$pos[image]',   WHERE `id_hotel` = $id ");
         //print_r($pos);
            $hotel_id = mysqli_query($con, 'SELECT `id` FROM `hotels` ORDER BY id DESC LIMIT 1');
            $hotel_id = mysqli_fetch_assoc($hotel_id);
            $hotel_id = $hotel_id['id'];
            $sql = mysqli_query($con, "UPDATE hotel_image SET `image2` = '$pos[image2]', `image3` = '$pos[image3]', `image4` = '$pos[image4]', `image5` = '$pos[image5]'  WHERE `id_hotel` = $id ");

      /*       $sql = "INSERT INTO `hotel_image` (`id_hotel`, `image`, `image2`, `image3`, `image4`) VALUES (?, ?, ?, ?, ?)";
            $add_st = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($add_st,'issss', $hotel_id, $pos['img2'], $pos['img3'], $pos['img4'], $pos['img5']);
            mysqli_stmt_execute($add_st); */
        }
        else{
            $sql = mysqli_query($con, "UPDATE hotels SET `title` = '$pos[title]', `price` = '$pos[price]', `description` = '$pos[description]', `city` = '$pos[city]' WHERE `id` = $id ");
            $hotel_id = mysqli_query($con, 'SELECT `id` FROM `hotels` ORDER BY id DESC LIMIT 1');
            $hotel_id = mysqli_fetch_assoc($hotel_id);
            $hotel_id = $hotel_id['id'];
            $sql = mysqli_query($con, "UPDATE hotel_image SET `image2` = '$pos[image2]', `image3` = '$pos[image3]', `image4` = '$pos[image4]', `image5` = '$pos[image5]'  WHERE `id_hotel` = $id ");
        }
        header("Location: /index.php");
    }
}
