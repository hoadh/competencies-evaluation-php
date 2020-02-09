<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <a href="index.php?page=outcomes/add_header&template_id=<?= $template_id; ?>" class="button">Thêm mục lớn</a>
    </div>

    <div class="large-12 cell">
        <table>
            <thead>
            <tr>
                <th width="300">Chuẩn đầu ra</th>
                <th width="120"></th>
                <th width="100"></th>
            </tr>
            </thead>
            <tbody>
            <?php $header = 0; $subheader = 0; $outnum = 0; foreach ($outcomes as $outcome): ?>
                <tr>
                <?php if ($outcome->can_evaluate): ?>
                    <td>
                        <a href="index.php?page=outcomes/edit&id=<?php echo $outcome->id; ?>">
                            <?php echo $header . "." . $subheader . "." . ++$outnum . ". " . $outcome->title; ?>
                        </a>
                    </td>
                    <td>
<!--                        <a href="index.php?page=outcomes/edit&id=--><?php //echo $outcome->id; ?><!--" class="button float-right">Cập nhật</a>-->
                    </td>
                    <td>
                        <a href="index.php?page=outcomes/delete&id=<?php echo $outcome->id; ?>" class="alert button">Xoá</a>
                    </td>
                <?php elseif ($outcome->parent_id != 0): ?>
                    <td>
                        <h5><?php echo $header . "." . ++$subheader . ". " . $outcome->title; $outnum = 0; ?></h5>
                    </td>
                    <td></td>
                    <td>
                        <a href="index.php?page=outcomes/add_outcomes" class="button secondary">Thêm chuẩn</a>
                    </td>

                <?php else: ?>
                    <td><h3><?php echo  ++$header . " - " . $outcome->title; $subheader = 0; ?></h3></td>

                    <td></td>
                    <td>
                        <a href="index.php?page=outcomes/add_subheader&template_id=<?= $template_id; ?>&parent_id=<?= $outcome->id; ?>" class="button">Thêm mục nhỏ</a>
                    </td>
                <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
