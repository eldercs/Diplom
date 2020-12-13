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
if($_SERVER['REQUEST_METHOD']=='POST'){
    $requared = ['email', 'password'];
    $pos = $_POST;
    foreach($requared as $name){
        if(empty($pos[$name])){
            $errors[$name] = "Это поле надо заполнить";
        }
    }
    if (!count($errors)) {
        $email = mysqli_real_escape_string($con, $pos['email']);
        $password = mysqli_real_escape_string($con, $pos['password']);
        try {
           // $user = fetchOne($con, "SELECT * FROM users WHERE email = '$email'");
           $emailExist = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
           $emailExist = mysqli_fetch_array($emailExist, MYSQLI_ASSOC);
        } catch (Exception $e) {
            renderErrorTemplate($e->getMessage(), $username);
        }

        if (password_verify($pos['password'], $emailExist['password'])) {
            $_SESSION['user'] = $emailExist;
            header("Location: /");
            exit();
        } else {
            $errors['all'] = 'Вы ввели неверный E-mail/пароль';
        }
    }
}
$page_content = shablon(
    'login',
    [   
        'errors' => $errors
    ]
    
); 
echo shablon(
    'layout',
    [   
        'my_array' => $my_array,
        'username' => $username,
        'page_content' =>  $page_content, 
        'title' => 'Регистрация',
    ]
);
?>