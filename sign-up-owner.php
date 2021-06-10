<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($username != null){
    header("Location: /index.php");
    exit();
}
$errors = [];
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
if($_POST){
    $pos = $_POST;
    $is_numeric = ['telephone'];
    $requared_string = ['email', 'name', 'password'];
    foreach($requared_string as $name){
        if(!array_key_exists($name, $pos) || empty($pos[$name])){
            $errors[$name]= "Это поле надо заполнить";
            print($errors[$name]);
            print($name);
        }
    }
    foreach($is_numeric as $name2){
        if(!is_numeric($pos[$name2]) || !array_key_exists($name, $pos)){
            $errors[$name] = 'Введите число больше нуля';
            print($errors[$name]);
            print($name); 
        }
        else if(strlen($pos[$name]) < 10){
            $errors[$name]= "Слишком мало символов";
            print_r($errors[$name]); 
        }
    }
    if (!count($errors)) {
        $pos = array_map('htmlspecialchars', $pos);
        mysqli_report(MYSQLI_REPORT_ALL);
        $email = mysqli_real_escape_string($con, $pos['email']);
        mysqli_report(MYSQLI_REPORT_STRICT);
        $emailExists = mysqli_query($con, "SELECT `id` FROM `users` WHERE `email` = '$email'");
        if (mysqli_num_rows($emailExists) > 0) {
            $errors['email'] = 'Такой E-mail уже существует';
        } else {
            $passwordHash = password_hash($pos['password'], PASSWORD_DEFAULT);
            try {
                $sql = "INSERT INTO `users` (`email`, `name`, `password`, `telephone`,`avatar`, `role`) VALUES ( ?, ?, ?, ?,'src/img/owner.png', 1)";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, 'sssi', $email, $pos['name'], $passwordHash, $pos['telephone']);
                mysqli_stmt_execute($stmt);
            } catch (Exception $e) {
                renderErrorTemplate($e->getMessage(), $username);
            }
            header("Location: /index.php#openModal");
           exit();
        }
     
    }
} 
$page_content = shablon(
    'sign-up-owner',
    [   
        'errors' => $errors,
    ]
    
); 
echo shablon(
    'layout',
    [   
        'my_array' => $my_array,
        'username' => $username,
        'page_content' =>  $page_content, 
        'title' => 'Регистрация владельца',
    ]
);
?>