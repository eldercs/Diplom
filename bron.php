<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
/* $key = $_GET['key'] ?? null; */
$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pos = $_POST;
    $lotId = (int)$pos['id_hotel'];
    //print_r($lotId);
    $requared = ['name', 'surname', 'patronymic'];
    $is_numeric = ['telephone'];
    foreach($requared as $name){
        if (!array_key_exists($name, $pos) || empty($pos[$name])) {
            $errors[$name] = 'Это поле надо заполнить';
            //print($name);
        }
    } 
    if(count($errors)){
        $page_content = shablon('hotel',
        [
            'errors' => $errors,
            'my_array' => $my_array,
        ]);
    }
    else{
        $months = array( 1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь' );
        $day = date('d '. $months[date( 'n' )] .' Y H:i:s');
        $hotel = fetchOne($con, "SELECT * FROM `hotels` WHERE `id` = $lotId");
        //print_r($creator);
        $sql = "INSERT INTO `bron` (`id_user`, `id_hotel`, `telephone`, `surname`, `name`, `patronymic`,`time`) VALUES ('$username[id]', '$hotel[id]', ?, ?, ?, ?,'$day')";
        $add_st = mysqli_prepare($con, $sql);

        mysqli_stmt_bind_param($add_st,'isss',  $pos['telephone'], $pos['surname'], $pos['name'],$pos['patronymic']);
        mysqli_stmt_execute($add_st);
        
        header("Location: /hotel.php?key=$lotId#openModal4");

    }   
}

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