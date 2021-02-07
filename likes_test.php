<?php
// подключение к бд
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
//echo("test");
// контейнер для ошибок 
$error = false;
// получение данных
$userId = (int) $_POST['id_user'];
$hotelsId = (int) $_POST['id_hotels'];
$type = $_POST['type'];
//alert('lol');
// проверяем, голосовал ранее пользователь за эту новость или нет
$sql = mysqli_query($con,"
	SELECT count(*) FROM `likes` WHERE `id_user` = $userId AND `id_hotels` = $hotelsId
") or die(mysqli_error()); 
$result = mysqli_fetch_row($sql);
// если что-то пришло из запроса, значит уже голосовал
//var_dump($result);exit;
if($result[0] > 0){
	$error = 'Вы уже голосовали';
}else{ // если пользователь не голосовал, проголосуем
	// получем поле для голосования - лайк или дизлайк
	if($type == 'like') $fieldName = 'count_like'; 
	// делаем запись о том, что пользователь проголосовал
	mysqli_query($con,"
		INSERT INTO `likes` (`id_hotels`, `id_user`) VALUES ($hotelsId, $userId)
	") or die(mysqli_error()); 
	// делаем запись для новости - увеличиваем количесво голосов(лайк или дизлайк)
	mysqli_query($con,"
		UPDATE `diplom`.`hotels` SET `$fieldName`= `$fieldName` + 1 WHERE  `id` = $hotelsId
	") or die(mysqli_error());
}
	
// делаем ответ для клиента
if($error){
	// если есть ошибки то отправляем ошибку и ее текст
	echo json_encode(array('result' => 'error', 'msg' => $error));
}else{
	// если нет ошибок сообщаем об успехе
	echo json_encode(array('result' => 'success'));
}
