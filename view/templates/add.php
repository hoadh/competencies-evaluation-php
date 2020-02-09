<h2>Tạo template đánh giá mới</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=templates/add">
    <div class="form-group">
        <label>Tiêu đê
            <input type="text" name="name"/>
        </label>
    </div>

    <label>Chương trình học</label>
    <select name="program_id">
        <?php foreach ($programs as $program): ?>
        <option value="<?php echo $program->id; ?>"><?php echo $program->name; ?></option>
        <?php endforeach; ?>
    </select>
    <div class="form-group">
        <button type="submit" value="" class="button">Tạo</button>
        <a href="index.php?page=templates/list" class="button secondary">Huỷ</a>
    </div>
</form>