<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <h3>Danh sách các lần đánh giá</h3>
    </div>

    <div class="large-12 cell">
        <table>
            <thead>
            <tr>
                <th>Chương trình</th>
                <th>Thời gian đánh giá</th>
                <th width="120"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($evaluations as $evaluation): ?>
                <tr>
                    <td><?php echo $evaluation->template_name; ?></td>
                    <td><?php echo $evaluation->created_date; ?></td>
                    <td>
                        <a href="index.php?page=evaluations/view&id=<?php echo $evaluation->id; ?>" class="button float-right">Xem</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
