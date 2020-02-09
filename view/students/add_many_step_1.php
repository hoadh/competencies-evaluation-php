<h2>Thêm nhiều học viên mới</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=students/add_many&step=2&clazz_id=<?php echo $clazz_id; ?>"">
    <div class="form-group">
        <label>Danh sách học viên của lớp <?= $clazz_name; ?>
            <textarea name="students" rows="20"></textarea>
        </label>
    </div>

    <div class="form-group">
        <button type="submit" value="" class="button">Thêm</button>
        <a href="index.php?page=students/list&clazz_id=<?php echo $clazz_id; ?>" class="button secondary">Huỷ</a>
    </div>
</form>