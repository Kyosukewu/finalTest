<?php
include_once "../base.php";

print_r($_POST);

$q1=$Que->find($_POST['id']);
$q1['count']++;
$Que->save($q1);

$op=$Que->find($_POST['vote']);
$op['count']++;
$Que->save($op);


to("../index.php?do=res&q={$q1['id']}")

?>