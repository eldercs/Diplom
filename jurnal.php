<?php
require_once 'functions.php';
require_once "init.php";
require_once "username.php";
if($username['role'] != 3){
    header("Location: /");
    exit();
}
try {
    $my_array = fetchAll($con, 'SELECT *  FROM `category`');
    $jurnal = fetchAll($con, 'SELECT *  FROM `jurnal` ORDER BY `time` DESC');
} catch (Exception $e) {
    renderErrorTemplate($e->getMessage(), $username);
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pos = $_POST;
    if($pos['category'] == 1){
        $jurnal = fetchAll($con, "SELECT * FROM `jurnal` WHERE jurnal.`time` >= CURDATE()" );
        $page_content = shablon(
            'jurnal',
            [
                'jurnal' => $jurnal,
            ]
        );
    }
    else if($pos['category'] == 2){
        $jurnal = fetchAll($con, "SELECT * FROM `jurnal` WHERE jurnal.`time` >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)" );
        $page_content = shablon(
            'jurnal',
            [
                'jurnal' => $jurnal,
            ]
        );
    }
    else if($pos['category'] == 3){
        $jurnal = fetchAll($con, "SELECT * FROM `jurnal` WHERE jurnal.`time` >= DATE_SUB(CURRENT_DATE, INTERVAL 30 DAY)" );
        $page_content = shablon(
            'jurnal',
            [
                'jurnal' => $jurnal,
            ]
        );
    }
    else if($pos['category'] == 4){
        $jurnal = fetchAll($con, 'SELECT *  FROM `jurnal` ORDER BY `time` DESC');
        $page_content = shablon(
            'jurnal',
            [
                'jurnal' => $jurnal,
            ]
        );
    }
    /* print_r($pos); */
}
else{
    $page_content = shablon(
        'jurnal',
        [
            'jurnal' => $jurnal,
        ]
    );
}

echo shablon(
    'layout',
    [
        'page_content' =>  $page_content,
        'my_array' => $my_array,
        'title' => 'Журнал событий',
        'username' => $username,
    ]
);
?>