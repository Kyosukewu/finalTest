<fieldset>
<legend>新增文章</legend>
<table>
<form action="api/addnews.php" method="post">
<table>
<tr>
    <td>文章標題</td>
    <td><input type="text" name="title"></td>
</tr>
<tr>
    <td>文章分類</td>
    <td>
    <select name="type">
    <option value="1">健康新知</option>
    <option value="2">菸害防治</option>
    <option value="3">癌症防治</option>
    <option value="4">慢性病防治</option>
    </select>
    </td>
</tr>
<tr>
    <td>文章內容</td>
    <td>
    <textarea name="text" cols="50" rows="10"></textarea>
    </td>
</tr>
</table>
<div class="ct">
<input type="hidden" name="good" value="0">
<input type="hidden" name="sh" value="1">
<input type="submit" value="新增">
<input type="reset" value="重置">
</div>
</form>
</table>
</fieldset>