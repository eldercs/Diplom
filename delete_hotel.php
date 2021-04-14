<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
mysqli_report(MYSQLI_REPORT_ALL); 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$idH = $_POST;

$deleteHot = (int)$idH['delete'];
$deleteImg = $idH['delete-img'];

$sql = mysqli_query($con,"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND id = $deleteHot") or die(mysqli_error()); 
$result = mysqli_fetch_row($sql);
if($result[0] > 0){
    try{
    mysqli_query($con,"DELETE FROM `likes` WHERE id_hotels = $deleteHot "); 
    $hotel_image = fetchAll($con,"SELECT `image`, `image2`, `image3`,`image4` FROM hotel_image WHERE id_hotel = $deleteHot");

    mysqli_query($con,"DELETE FROM `hotel_image` WHERE `id_hotel` = $deleteHot "); 
    mysqli_query($con,"DELETE FROM `comments` WHERE `hotel_id` = $deleteHot "); 
	mysqli_query($con,"DELETE FROM `hotels` WHERE `user_id` = $username[id] AND id = $deleteHot "); 
    if(file_exists($deleteImg)){
        unlink($deleteImg);
    }

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
