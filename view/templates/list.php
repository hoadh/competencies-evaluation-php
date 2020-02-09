<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <a href="index.php?page=templates/add" class="button">Tạo template mới</a>
    </div>

    <div class="large-12 cell">
        <table>
            <thead>
            <tr>
                <th width="200">Tiêu đề</th>
                <th>Chương trình</th>
                <th width="120"></th>
                <th width="100"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($templates as $template): ?>
                <tr>
                    <td><a href="index.php?page=cat_outcomes/list&template_id=<?php echo $template->id; ?>"><?php echo $template->name; ?></a></td>
                    <td><?php echo $template->program_name; ?></td>
                    <td>
                        <a href="index.php?page=templates/edit&id=<?php echo $template->id; ?>" class="button float-right">Cập nhật</a>
                    </td>
                    <td>
                        <a href="index.php?page=templates/delete&id=<?php echo $template->id; ?>" class="alert button">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
