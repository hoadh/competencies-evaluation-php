<h2>Tạo lớp học mới</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=clazzes/add">
    <div class="form-group">
        <label>Tên lớp
            <input type="text" name="name"/>
        </label>
    </div>
    <div class="form-group">
        <label>Huấn luyện viên
            <input type="text" name="coach"/>
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
        <a href="index.php?page=clazzes/list" class="button secondary">Huỷ</a>
    </div>
</form>