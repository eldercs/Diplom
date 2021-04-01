<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
mysqli_report(MYSQLI_REPORT_ALL); 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$idH = $_POST;
/* print_r($idH['delete']); */
$deleteHot = (int)$idH['delete'];
/* echo(gettype($test)); */
$sql = mysqli_query($con,"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND id = $deleteHot") or die(mysqli_error()); 
$result = mysqli_fetch_row($sql);
if($result[0] > 0){
    try{
    mysqli_query($con,"DELETE FROM `likes` WHERE id_hotels = $deleteHot "); 
	mysqli_query($con,"DELETE FROM `hotels` WHERE `user_id` = $username[id] AND id = $deleteHot "); 
    
    header("Location: /");
    exit();
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}
else{
    header("Location: /");
    exit();
}
}
?>
