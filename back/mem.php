<fieldset>
<legend>帳號管理</legend>
<form action="api/delmem.php" method="post">
<table>
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>刪除</td>
    </tr>
<?php
$mems=$Mem->all(" where acc != 'admin'");
foreach ($mems as $key => $value) {
?>
    <tr>
        <td><?=$value['acc'];?></td>
        <td><?=str_repeat("*",strlen($value['pw']));?></td>
        <td><input id="del" type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
    </tr>
    <?php
}
?>
</table>
<div class="ct">
<input type="submit" value="確認刪除">
<input type="reset" value="清空選取">
</div>
</form>
<form>
<h2>新增會員</h2>
<table>
<tr>
    <td colspan="2" style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
</tr>
<tr>
    <td>帳號：</td>
    <td><input type="text" name="acc" id="acc"></td>
</tr>
<tr>
    <td>密碼：</td>
    <td><input type="password" name="pw" id="pw"></td>
</tr>
<tr>
    <td>確認密碼：</td>
    <td><input type="password" name="pw2" id="pw2"></td>
</tr>
<tr>
    <td>信箱：</td>
    <td><input type="text" name="email" id="email"></td>
</tr>
<tr>
    <td colspan="2">
    <input type="button" value="新增" onclick="reg()">
    <input type="reset" value="清除">
    </td>
</tr>
</table>
</form>
</fieldset>

<script>
function reg(){
    let acc=$('#acc').val()
    let pw=$('#pw').val()
    let pw2=$('#pw2').val()
    let email=$('#email').val()

    if(acc=="" || pw=="" || pw2=="" || email==""){
        alert('不可為空')
    }else if(pw!=pw2){
        alert('密碼錯誤')
    }else{
        $.post('api/chkacc.php',{acc},function(r){
            if(r==1){
                alert('帳號重複')
            }else{
                $.post('api/reg.php',{acc,pw,email},function(res){
                    alert("新增完成")
                })
            }
        })
    }
}
</script>
</fieldset>