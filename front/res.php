<?php
$que = $Que->find($_GET['q']);
?>

<style>
    .bar {
        /* width: 50%; */
        height: 1.5rem;
        background: #666;
        display: inline-block;
    }
</style>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['text']; ?></legend>
    <div class=""><?= $que['text']; ?></div>
    <table>
        <?php
        $ques = $Que->all(['sub' => $_GET['q']]);
        foreach ($ques as $k => $v) {
        ?>
            <tr>
                <td style="width:50%;"><?= $v['text']; ?></td>
                <td style="width:50%;">
                    <div class="bar" style="width:<?= round(($v['count']) / $que['count'] * 100); ?>%;"></div>
                        <?= $v['count']; ?>票(<?= round(($v['count']) / $que['count'] * 100); ?>%)
                </td>
            </tr>
        <?php
        } ?>
    </table>
    <input type="hidden" name="id" value="<?= $_GET['q']; ?>">
    <a href="?do=que"><button>返回</button></a>

</fieldset>