<?php
$que=$Que->find($_GET['q']);
?>
<fieldset>
<legend>目前位置：首頁 > 問卷調查 > <?=$que['text'];?></legend>
<form action="api/vote.php" method="post">
<div class=""><?=$que['text'];?></div>
<?php
$ques=$Que->all(['sub'=>$_GET['q']]);
foreach($ques as $v){
?>
<div><input type="radio" name="vote" value="<?=$v['id'];?>"><?=$v['text'];?></div>
<?php
}?>
<input type="hidden" name="id" value="<?=$_GET['q'];?>">
<input type="submit" value="我要投票">
</form>

</fieldset>