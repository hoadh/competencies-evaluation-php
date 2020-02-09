<h2>Thêm mục nhỏ</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=outcomes/add_subheader&template_id=<?= $template_id; ?>&parent_id=<?=$parent_id;?>">
    <input type="hidden" name="parent_id" value="<?= $parent_id; ?>" />
    <div class="form-group">
        <label>Tiêu đề
            <input type="text" name="title"/>
        </label>
    </div>
    <div class="form-group">
        <button type="submit" value="" class="button">Thêm</button>
        <a href="index.php?page=outcomes/list&template_id=<?= $template_id; ?>" class="button secondary">Huỷ</a>
    </div>
</form>