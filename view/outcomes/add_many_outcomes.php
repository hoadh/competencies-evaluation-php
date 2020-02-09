<h2>Thêm chuẩn đầu ra</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=outcomes/add_many_outcomes&step=2&template_id=<?php echo $template_id; ?>&parent_id=<?=$parent_id;?>">
<div class="form-group">
    <label>Danh sách chuẩn đầu ra
        <textarea name="outcomes" rows="20"></textarea>
    </label>
</div>

<div class="form-group">
    <button type="submit" value="" class="button">Thêm</button>
    <a href="index.php?page=outcomes/list&template_id=<?php echo $template_id; ?>" class="button secondary">Huỷ</a>
</div>
</form>