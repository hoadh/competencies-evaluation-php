<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <a href="index.php?page=clazzes/add" class="button">Tạo lớp học mới</a>
    </div>

    <div class="large-12 cell">
        <table>
            <thead>
            <tr>
                <th width="200">Tên lớp</th>
                <th>Huấn luyện viên</th>
                <th width="120"></th>
                <th width="100"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clazzes as $clazz): ?>
                <tr>
                    <td><a href="index.php?page=clazzes/view&id=<?php echo $clazz->id; ?>"><?php echo $clazz->name; ?></a></td>
                    <td><?php echo $clazz->coach; ?></td>
                    <td>
                        <a href="index.php?page=clazzes/edit&id=<?php echo $clazz->id; ?>" class="button float-right">Cập nhật</a>
                    </td>
                    <td>
                        <a href="index.php?page=clazzes/delete&id=<?php echo $clazz->id; ?>" class="alert button">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
