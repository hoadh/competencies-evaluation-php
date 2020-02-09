<h2>Tạo tiêu đề phụ</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=outcomes/add_subheader">
    <input type="hidden" name="parent_id" value="<?= $parent_id; ?>" />
    <div class="form-group">
        <label>Tiêu đề
            <input type="text" name="title"/>
        </label>
    </div>
    <div class="form-group">
        <button type="submit" value="" class="button">Tạo</button>
        <a href="index.php?page=outcomes/list" class="button secondary">Huỷ</a>
    </div>
</form>