<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td style="width: 30%;">標題</td>
            <td style="width: 58%;">內容</td>
            <td style="width: 10%;"></td>
        </tr>
        <?php
        $count = $News->count(['sh' => 1]);
        $div = 5;
        $p = ceil($count / $div);
        $now = $_GET['p'] ?? 1;
        $st = ($now - 1) * $div;

        $news = $News->all(['sh' => 1], " limit $st,$div");
        foreach ($news as $v) {
        ?>
            <tr>
                <td class="hd"><?= $v['tit']; ?></td>
                <td>
                    <span class="tit"><?= mb_substr($v['txt'], 0, 20); ?>...</span>
                    <span class="txt" style="display:none;"><?= $v['txt']; ?></span>
                </td>
                <td>
                    <?php
                    if (!empty($_SESSION['login'])) {
                        $chk = $Good->count(['acc' => $_SESSION['login'], 'news' => $v['id']]);
                        if ($chk) {
                    ?>
                    <a id="good<?=$v['id'];?>" href="#" onclick="good('<?=$v['id'];?>','2','<?=$_SESSION['login'];?>')">回收讚</a>
                    <?php
                        }else{
                    ?>
                    <a id="good<?=$v['id'];?>" href="#" onclick="good('<?=$v['id'];?>','1','<?=$_SESSION['login'];?>')">讚</a>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        if (($now - 1) > 0) {
            echo "<a href='?do=news&p=" . ($now - 1) . "'> < </a>";
        }
        for ($i = 1; $i <= $p; $i++) {
            $f = ($i == $now) ? "28px" : "18px";
            echo "<a style='font-size:" . $f . ";' href='?do=news&p=$i'>" . $i . "</a>";
        }
        if (($now + 1) <= $p) {
            echo "<a href='?do=news&p=" . ($now + 1) . "'> > </a>";
        }

        ?>

    </div>
</fieldset>
<script>
    $('.hd').on('click', function() {
        $(this).next('td').children('.tit').toggle()
        $(this).next('td').children('.txt').toggle()
    })
</script>