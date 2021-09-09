<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";

$months = array( 1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь' );
$error = false;
$user = $_POST['user'];
$hotelsId = (int) $_POST['id_hotels'];
$comment = $_POST['user_comment'];
$day = date('d '. $months[date( 'n' )] .' Y H:i:s');
if(strlen($comment) != 0){
  mysqli_query($con,"
  INSERT INTO `comments` (`hotel_id`, `comment`, `user`,`date`) VALUES ('$hotelsId', '$comment', '$user','$day')
  ") or die(mysqli_error());
}
else{
  $error = true;
}
/* if($error){
	// если есть ошибки то отправляем ошибку и ее текст
	echo json_encode(array('result' => 'error', 'msg' => $error));
}else{ */
	// если нет ошибок сообщаем об успехе
	echo json_encode(array('result' => 'success', 'comment' => $comment, 'user' => $user, 'day' => $day, 'error' => $error));

/* mysqli_query($con,"
  INSERT INTO `comments` (`hotel_id`, `comment`, `user`,`date`) VALUES ('13', '321', '322','$day')
	") or die(mysqli_error()); */

/* mysqli_query($con,"
  INSERT INTO `comments` (`hotel_id`, `comment`, `user`,`date`) VALUES ('$hotelsId', '$hotelsId', '$user','$day')
	") or die(mysqli_error()); */






/*
$months = array( 1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь' );

$user = $_POST["name"];
$page_id = $_POST["page_id"];
$comment = $_POST["comment"];
$day = date('d '. $months[date( 'n' )] .' Y H:i:s');

$user = htmlspecialchars($user);
$comment = htmlspecialchars($comment);
$com = mysqli_query($con, "INSERT INTO `comments` (`hotel_id`, `comment`, `user`,`date`) VALUES ('$page_id', '$comment', '$user','$day')");

header("Location: ".$_SERVER["HTTP_REFERER"]); */


?>