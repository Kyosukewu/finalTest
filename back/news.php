<fieldset>
<legend>最新文章管理</legend>
<a href="?do=addnews">
<button>新增文章</button>
</a>
<form action="api/editnews.php" method="post">
<table style="width: 100%;">
        <tr>
            <td style="width: 10%;">編號</td>
            <td style="width: 70%;">標題</td>
            <td style="width: 10%;">顯示</td>
            <td style="width: 10%;">刪除</td>
        </tr>
        <?php
        $count = $News->count();
        $div = 3;
        $p = ceil($count / $div);
        $now = $_GET['p'] ?? 1;
        $st = ($now - 1) * $div;

        $news = $News->all(" limit $st,$div");
        foreach ($news as $k=>$v) {
        ?>
            <tr>
                <td class="hd"><?= ($st+1+$k); ?>.</td>
                <td class="hd"><?= $v['tit']; ?></td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?= $v['id']; ?>" <?=($v['sh']==1)?"checked":"";?>>
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?= $v['id']; ?>">
                    <input type="hidden" name="id[]" value="<?= $v['id']; ?>">
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
    <div class="ct">
        <input type="submit" value="確定修改">
        </div>
    </form>
</fieldset>