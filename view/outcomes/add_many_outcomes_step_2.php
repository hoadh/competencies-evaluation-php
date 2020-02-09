<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <h2>Danh sách chuẩn đầu ra</h2>
    </div>

    <?php
    if(isset($message)){
        echo "<p class='alert-info'>$message</p>";

        ?>
        <a href="index.php?page=outcomes/list&template_id=<?php echo $template_id; ?>" class="button secondary">Quay lại</a>
        <?php
    } else {

    ?>

    <div class="large-12 cell">
        <form method="post" action="./index.php?page=outcomes/add_many_outcomes&step=3&template_id=<?php echo $template_id; ?>&parent_id=<?=$parent_id;?>">
        <table>
            <thead>
            <tr>
                <!--                    <th><input type="checkbox" name="selected" checked/></th>-->
                <th width="100" align="center">Thứ tự</th>
                <th>Chuẩn đầu ra</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1; foreach ($outcomes as $outcome): ?>
                <tr>
                    <td align="center"><?= $count++; ?></td>
                    <td><input type="text" name="outcomes[]" value="<?= $outcome; ?>"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-group">
            <button type="submit" value="" class="button">Lưu</button>
            <a href="index.php?page=outcomes/list&template_id=<?php echo $template_id; ?>" class="button secondary">Huỷ</a>
        </div>
        </form>
    </div>

    <?php } ?>
</div>
