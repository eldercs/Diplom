<?php
function shablon(string $adress,$arr = array()){
$adress_buffer="";
$adress = "templates/" . $adress . ".php";
if(file_exists($adress)){
    extract($arr, EXTR_REFS);
    //require_once($adress);
    ob_start();
    include $adress; 
    $adress_buffer = ob_get_clean();
}
return $adress_buffer;
}
function fetchAll($con, $sql) {
    if ($result = mysqli_query($con, $sql)) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        throw new Exception(mysqli_error($con));
    }
}
function fetchOne($con, $sql) {
    if ($result = mysqli_query($con, $sql)) {
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        throw new Exception(mysqli_error($con));
    }
}
function renderErrorTemplate($error, $username) {
    exit();
}
?>