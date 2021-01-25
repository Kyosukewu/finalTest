<?php
include_once "../base.php";

switch($_POST['type']){
    case "1":
        $Good->save([
            'acc'=>$_POST['user'],
            'news'=>$_POST['id']
        ]);
        $news=$News->find($_POST['id']);
        $news['good']++;
        $News->save($news);
    break;
    case "2":
        $Good->del([
            'acc'=>$_POST['user'],
            'news'=>$_POST['id']
        ]);
        $news=$News->find($_POST['id']);
        $news['good']--;
        $News->save($news);
    break;
}

?>