<h1>Bạn có muốn xoá chương trình học này?</h1>

<h3><?php echo $clazz->name; ?></h3>

<form action="./index.php?page=clazzes/delete" method="post">
    <input type="hidden" name="id" value="<?php echo $clazz->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="button alert"/>
        <a class="button secondary" href="index.php">Huỷ</a>
    </div>
</form>