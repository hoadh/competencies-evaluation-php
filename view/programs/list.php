<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <a href="index.php?page=programs/add" class="button">Thêm chương trình mới</a>
    </div>

    <div class="large-12 cell">
        <table>
            <thead>
            <tr>
                <th width="200">Tên chương trình</th>
                <th>Hình thức học</th>
                <th width="120"></th>
                <th width="100"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($programs as $program): ?>
                <tr>
                    <td><a href="index.php?page=programs/view&id=<?php echo $program->id; ?>"><?php echo $program->name; ?></a></td>
                    <td><?php echo $program->type; ?></td>
                    <td>
                        <a href="index.php?page=programs/edit&id=<?php echo $program->id; ?>" class="button float-right">Cập nhật</a>
                    </td>
                    <td>
                        <a href="index.php?page=programs/delete&id=<?php echo $program->id; ?>" class="alert button">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
