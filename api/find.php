<?php
include_once "../base.php";

$chk=$Mem->find(['email'=>$_POST['email']]);
if(!empty($chk)){
    echo $chk['pw'];
}else{
    echo 0;
}

?>