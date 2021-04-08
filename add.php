<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($username == null){
    header("Location: /login.php");
    exit();
}
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pos = $_POST;
    //print_r($pos);
    $requared = ['name', 'category', 'description', 'city'];
    $is_numeric = [
        'price',
    ];
   // $errors = [];
    foreach($requared as $name){
        if (!array_key_exists($name, $pos) || empty($pos[$name])) {
            $errors[$name] = 'Это поле надо заполнить';
            print($name);
        }
    } 
   
   // $gif = $_POST;
   foreach($is_numeric as $name){
    if(!is_numeric($pos[$name]) || intval($pos[$name]) <= 0){
   /*      if (array_key_exists($name, $lot) && $lot[$name] && (!is_numeric($lot[$name]) || intval($lot[$name]) <= 0)) { */
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
/*     if(strtotime($gif['end_date']) < strtotime('tomorrow')) {
        $errors['end_date'] = 'Введите дату больше текущей даты';
    } */
    if(count($errors)){
        $page_content = shablon('add',
        [
            'errors' => $errors,
            'my_array' => $my_array,
        ]);
    }
    else{
        $pos = array_map('htmlspecialchars', $pos);
        $sql = "INSERT INTO `hotels` (`user_id`, `title`, `category_id`, `price`, `city`, `description`,`title_image`, `count_like`) VALUES ('$username[id]', ?, ?, ?, ?, ?, ?,'0')";
        $add_st = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($add_st,'ssisss', $pos['name'], $pos['category'], $pos['price'],$pos['city'], $pos['description'], $pos['img']);
        mysqli_stmt_execute($add_st);
        

        mysqli_query($con, "INSERT INTO hotel_image (`id_hotel`, `image`, `image2`, `image3`, `image4`) VALUES (LAST_INSERT_ID(), '0', '0', '0', '0')"); 

        header("Location: /");
        /* $hotel_id = mysqli_query($con, 'SELECT `id` FROM `hotels` ORDER BY id DESC LIMIT 1');
        $hotel_id = mysqli_fetch_assoc($hotel_id);
        $hotel_id = $hotel_id['id'];

        $sql = "INSERT INTO `hotel_image` (`id_hotel`, `image`) VALUES (?, ?)";
        $add_st = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($add_st,'is', $hotel_id, $pos['img']);
        mysqli_stmt_execute($add_st); */
        //echo($hotel_id);
      
      //  cache_del_data([$_SESSION['user_id']], 'user_fav');
    }   
}
$page_content = shablon(
    'add',
    [   
        'my_array' => $my_array
    ]
); 
echo shablon(
    'layout',
    [
        'my_array' => $my_array,
        'username' => $username,
        'page_content' =>  $page_content, 
        'title' => 'Добавление объявления',
    ]
);

?>