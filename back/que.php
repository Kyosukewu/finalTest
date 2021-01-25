<fieldset>
<legend>問卷列表</legend>
<table>
<tr>
    <td style="width:80%;">問卷名稱</td>
    <td style="width:10%;">投票數</td>
    <td style="width:10%;">開放</td>
</tr>
<?php
$ques=$Que->all(['sub'=>0]);
foreach($ques as $v){
?>
<tr>
    <td><?=$v['text'];?></td>
    <td><?=$v['count'];?></td>
    <td>
    <?php
    if($v['sh']==1){
    ?>
    <button onclick="sh('<?=$v['id'];?>')">開放</button>
    <?php
    }else{
    ?>
    <button onclick="sh('<?=$v['id'];?>')">關閉</button>
    <?php
    }
    ?>
    </td>
</tr>
<?php
}
?>
</table>
</fieldset>
<fieldset>
<legend>新增問卷</legend>
<form action="api/addque.php" method="post">
<table>
<tr>
    <td>問卷名稱</td>
    <td><input type="text" name="text"></td>
</tr>
<tr id="addop">
    <td>選項</td>
    <td><input type="text" name="sub[]"><input type="button" value="更多" onclick="addop()"></td>
</tr>
</table>
<input type="submit" value="新增"> | <input type="reset" value="清空">
</form>
</fieldset>

<script>
function sh(id){
    $.post('api/quesh.php',{id},function(){
        location.reload()
    })
}
function addop(){
    $('#addop').after(`
    <tr>
    <td>選項</td>
    <td><input type="text" name="sub[]"></td>
    </tr>
    `)
}
</script>