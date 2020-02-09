<h2>Tạo chương trình học mới</h2>
<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<form method="post" action="./index.php?page=programs/add">
    <div class="form-group">
        <label>Chương trình học
            <input type="text" name="name"/>
        </label>
    </div>
    <div class="form-group">
        <label>Hình thức đào tạo
            <input type="text" name="type"/>
        </label>
    </div>
    <div class="form-group">
        <button type="submit" value="" class="button">Tạo</button>
        <a href="index.php" class="button secondary">Huỷ</a>
    </div>
</form>