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
?>