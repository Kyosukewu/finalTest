<?php
include_once "../base.php";

$News->save($_POST);

to('../back.php?do=news');

?>