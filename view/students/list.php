<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <a href="index.php?page=students/add_many&clazz_id=<?php echo $clazz_id; ?>" class="button">Thêm nhiều học viên</a>
    </div>

    <div class="large-12 cell">
        <table>
            <thead>
            <tr>
                <th>Thứ tự</th>
                <th>Mã học viên</th>
                <th>Tên học viên</th>
                <th width="120"></th>
                <th width="100"></th>
            </tr>
            </thead>
            <tbody>
            <?php $count=1; foreach ($students as $student): ?>
                <tr>
                    <td><?= $count++; ?></td>
                    <td><a href="index.php?page=students/view&clazz_id=<?php echo $student->id; ?>"><?php echo $student->name; ?></a></td>
                    <td><?php echo $student->code; ?></td>
                    <td>
                        <a href="index.php?page=students/edit&id=<?php echo $student->id; ?>" class="button float-right">Cập nhật</a>
                    </td>
                    <td>
                        <a href="index.php?page=students/delete&id=<?php echo $student->id; ?>" class="alert button">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
