<fieldset>
<legend>目前位置：首頁 > 問卷調查</legend>
<table style="width:100%;">
<tr>
    <td style="width:10%;">編號</td>
    <td style="width:60%;">問卷題目</td>
    <td style="width:10%;">投票總數</td>
    <td style="width:10%;">結果</td>
    <td style="width:10%;">狀態</td>
</tr>
<?php
$ques=$Que->all(['sub'=>0,'sh'=>1]);
foreach($ques as $k=>$v){
?>
<tr>
    <td><?=($k+1);?></td>
    <td><?=$v['text'];?></td>
    <td><?=$v['count'];?></td>
    <td>
    <a href="?do=res&q=<?=$v['id'];?>">結果</a>
    </td>
    <?php
    if(!empty($_SESSION['login'])){
    ?>
    <td>
    <a href="?do=vote&q=<?=$v['id'];?>">參與投票</a>
    </td>
    <?php
    }else{
    ?>
    <td>
    <a href="?do=login">請先登入</a>
    </td>
    <?php
    }
    ?>
</tr>
<?php
}
?>
</table>
</fieldset>