<h2>Cập nhật thông tin lớp học</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="index.php?page=clazzes/edit">
    <input type="hidden" name="id" value="<?= $clazz->id; ?>"/>
    <div class="form-group">
        <label>Tên lớp
            <input type="text" name="name" value="<?= $clazz->name ?>"/>
        </label>
    </div>
    <div class="form-group">
        <label>Huấn luyện viên
            <input type="text" name="coach" value="<?= $clazz->coach ?>"/>
        </label>
    </div>

    <label>Chương trình học</label>
    <select name="program_id">
        <?php foreach ($programs as $program): ?>
            <option value="<?php echo $program->id; ?>" <?php echo ($clazz->program_id === $program->id) ? 'selected' : '' ?> >
                    <?php echo $program->name; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div class="form-group">
        <button type="submit" value="" class="button">Cập nhật</button>
        <a href="index.php?page=clazzes/list" class="button secondary">Huỷ</a>
    </div>
</form>