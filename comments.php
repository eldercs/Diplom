<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";

  /* Принимаем данные из формы */
  $user = $_POST["name"];
  $page_id = $_POST["page_id"];
  $comment = $_POST["comment"];
  $day = strtotime('today');
  $user = htmlspecialchars($user);// Преобразуем спецсимволы в HTML-сущности
  $comment = htmlspecialchars($comment);// Преобразуем спецсимволы в HTML-сущности
  $com = mysqli_query($con, "INSERT INTO `comments` (`hotel_id`, `comment`, `user`,`date`) VALUES ('$page_id', '$comment', '$user','$day')");// Добавляем комментарий в таблицу
  header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно

  
?>