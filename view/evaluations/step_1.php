<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <h3>Chọn template đánh giá</h3>
    </div>

    <div class="large-12 cell">
        <table>
            <thead>
            <tr>
                <th width="200">Tiêu đề</th>
                <th>Chương trình</th>
                <th width="120"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($templates as $template): ?>
                <tr>
                    <td><?php echo $template->name; ?></td>
                    <td><?php echo $template->program_name; ?></td>
                    <td>
                        <a href="index.php?page=evaluations/step_2&template_id=<?php echo $template->id; ?>&student_id=<?= $student_id; ?>" class="button float-right">Chọn</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
