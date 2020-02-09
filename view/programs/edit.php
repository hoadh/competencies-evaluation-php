<h2>Cập nhật thông tin chương trình học</h2>

<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=programs/edit">
    <input type="hidden" name="id" value="<?php echo $program->id; ?>"/>
    <div class="form-group">
        <label>Chương trình học
            <input type="text" name="name" value="<?php echo $program->name; ?>"/>
        </label>
    </div>
    <div class="form-group">
        <label>Hình thức đào tạo
            <input type="text" name="type" value="<?php echo $program->type; ?>"/>
        </label>
    </div>
    <div class="form-group">
        <button type="submit" value="" class="button">Cập nhật</button>
        <a href="index.php" class="button secondary">Huỷ</a>
    </div>
</form>