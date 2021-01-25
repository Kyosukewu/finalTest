<?php
include_once "../base.php";

$que=$Que->find($_POST['id']);

($que['sh']==1)?$que['sh']=0:$que['sh']=1;

$Que->save($que);

?>