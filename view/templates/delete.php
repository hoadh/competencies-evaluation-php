<h1>Bạn có muốn xoá template đánh giá này?</h1>

<h3><?php echo $template->name; ?></h3>

<form action="./index.php?page=templates/delete" method="post">
    <input type="hidden" name="id" value="<?php echo $template->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="button alert"/>
        <a class="button secondary" href="index.php?page=templates/list">Huỷ</a>
    </div>
</form>