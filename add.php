<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($username == null){
    header("Location: /#openModal");
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
    $requared = ['name', 'category', 'description', 'city'];
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
        nl2br($pos['description']);
        mysqli_stmt_bind_param($add_st,'ssisss', $pos['name'], $pos['category'], $pos['price'],$pos['city'], $pos['description'], $pos['img']);
        mysqli_stmt_execute($add_st);
        
        mysqli_query($con, "INSERT INTO hotel_image (`id_hotel`, `image2`, `image3`, `image4`, `image5`) VALUES (LAST_INSERT_ID(), '0', '0', '0', '0')"); 
        /* mysqli_query($con, "INSERT INTO jurnal (`id_creater`, `hotel_title`, `time`) VALUES ('$username[id]', '$pos[name]', '2' )");  */
        $sql2 = "INSERT INTO `jurnal` (`creator`, `hotel_title`,`time`) VALUES ('$username[name]', ?, NOW())";
        $add_st2 = mysqli_prepare($con, $sql2);
        mysqli_stmt_bind_param($add_st2,'s', $pos['name']);
        mysqli_stmt_execute($add_st2); 
        header("Location: /");

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