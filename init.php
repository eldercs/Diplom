<?php
$con = mysqli_connect("localhost", "root", "", "diplom");
if($con == false){
    print("Ошибка подключения". mysqli_connect_error());
}
else
mysqli_set_charset($con, "utf8");
?>