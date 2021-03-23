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
if($_SERVER['REQUEST_METHOD']){
    $pos = $_POST;
    $requared_string = ['email', 'name', 'password', 'contacts', 'username'];
    foreach($requared_string as $name){
        if(!array_key_exists($name, $pos) || empty($pos[$name])){
            $errors[$name]= "Это поле надо заполнить";
          //  print($errors[$name]);
        }
    }
    if (!empty($_FILES['avatar']['name'])) {
    
        $tmpName = $_FILES['avatar']['tmp_name'];
        $folder = 'img/uploads/';
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $path = $folder . $_FILES['avatar']['name'];
        $fileType = mime_content_type($tmpName);
        if ($fileType !== "image/jpeg" && $fileType !== "image/png") {
            $errors['avatar'] = 'Загрузите картинку в формате jpg или png';
        } else {
            move_uploaded_file($tmpName, $path);
            $pos['avatar'] = $path;
        }
    } else {
        $errors['avatar'] = 'Вы не загрузили файл';
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
                $sql = "INSERT INTO `users` (`email`, `name`, `password`, `avatar`, `contacts`, `username`) VALUES ( ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, 'ssssss', $email, $pos['name'], $passwordHash, $pos['avatar'], $pos['contacts'], $pos['username']);
                mysqli_stmt_execute($stmt);
            } catch (Exception $e) {
                renderErrorTemplate($e->getMessage(), $username);
            }
           header("Location: /login.php");
           exit();
        }
     
    }
} 
$page_content = shablon(
    'sign-up',
    [   
        //'my_array' => $my_array,
        'errors' => $errors,
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