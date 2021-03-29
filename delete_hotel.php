<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$idH = $_POST;
/* print_r($idH['delete']); */
$test = (int)$idH['delete'];
/* echo(gettype($test)); */
$sql = mysqli_query($con,"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND id = $test") or die(mysqli_error()); 
$result = mysqli_fetch_row($sql);
if($result[0] > 0){
	mysqli_query($con,"
		DELETE FROM `hotels` WHERE `user_id` = $username[id] AND id = $test
	") or die(mysqli_error()); 
    header("Location: /");
    exit();
}
else{
    header("Location: /");
    exit();
}
}
?>
