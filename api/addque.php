<?php
include_once "../base.php";

if(!empty($_POST['text'])){
    $que['text'] = $_POST['text'];
    $que['count'] = 0;
    $que['sub'] = 0;
    $que['sh'] = 1;
    
    $Que->save($que);
}

// print_r($que);
$que = $Que->find(['text' => $_POST['text']]);

// print_r($que);

foreach ($_POST['sub'] as $s) {
    if(!empty($s)){
        $sub['text']=$s;
        $sub['sub'] = $que['id'];
        $sub['count'] = 0;
        $sub['sh'] = 0;
    
        $Que->save($sub);
    }
    // print_r($sub);
}

to('../back.php?do=que');

