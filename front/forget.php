<fieldset>
<legend>忘記密碼</legend>
<div>請輸入信箱以查詢密碼</div>
<div><input type="text" name="email" id="email"></div>
<div class="ans"></div>
<div><input type="button" value="尋找" onclick="find()"></div>
</fieldset>
<script>
function find(){
    let email=$('#email').val()
    $.post('api/find.php',{email},function(r){
        if(r==0){
            $('.ans').text("查無此資料")
        }else{
            $('.ans').text(`您的密碼為${r}`)
        }
    })
}
</script>