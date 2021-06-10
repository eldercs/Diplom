<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
$months = array( 1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь' );
  /* Принимаем данные из формы */
  $user = $_POST["name"];
  $page_id = $_POST["page_id"];
  $comment = $_POST["comment"];
  $day = date('d '. $months[date( 'n' )] .' Y H:i:s');
/*   print_r($day); */
  $user = htmlspecialchars($user);// Преобразуем спецсимволы в HTML-сущности
  $comment = htmlspecialchars($comment);// Преобразуем спецсимволы в HTML-сущности
  $com = mysqli_query($con, "INSERT INTO `comments` (`hotel_id`, `comment`, `user`,`date`) VALUES ('$page_id', '$comment', '$user','$day')");// Добавляем комментарий в таблицу
  header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно

  
?>