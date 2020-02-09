<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <h2>Học viên lớp <?= $clazz_name; ?></h2>
    </div>
        <div class="large-12 cell">
            <form method="post" action="./index.php?page=students/add_many&step=3&clazz_id=<?php echo $clazz_id; ?>"">
            <table>
                <thead>
                <tr>
<!--                    <th><input type="checkbox" name="selected" checked/></th>-->
                    <th>Thứ tự</th>
                    <th>Mã học viên</th>
                    <th>Tên học viên</th>
<!--                    <th>Email</th>-->
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; foreach ($students as $student): ?>
                    <tr>
<!--                        <td><input type="checkbox" name="selected" checked/></td>-->
                        <td><?= $count++; ?></td>
                        <td><input type="text" name="names[]" value="<?= $student[1]; ?>"></td>
                        <td><input type="text" name="codes[]" value="<?= $student[2]; ?>"></td>
<!--                        <td>--><?//= $student[3]; ?><!--</td>-->
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

                <div class="form-group">
                    <button type="submit" value="" class="button">Lưu</button>
                    <a href="index.php?page=students/list" class="button secondary">Huỷ</a>
                </div>
            </form>
        </div>
</div>
