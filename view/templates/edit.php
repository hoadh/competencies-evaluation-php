<h2>Cập nhật tempalte đánh giá</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="index.php?page=templates/edit">
    <input type="hidden" name="id" value="<?= $template->id; ?>"/>
    <div class="form-group">
        <label>Tên lớp
            <input type="text" name="name" value="<?= $template->name ?>"/>
        </label>
    </div>

    <label>Chương trình học</label>
    <select name="program_id">
        <?php foreach ($programs as $program): ?>
            <option value="<?php echo $program->id; ?>" <?php echo ($template->program_id === $program->id) ? 'selected' : '' ?> >
                    <?php echo $program->name; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div class="form-group">
        <button type="submit" value="" class="button">Cập nhật</button>
        <a href="index.php?page=templates/list" class="button secondary">Huỷ</a>
    </div>
</form>