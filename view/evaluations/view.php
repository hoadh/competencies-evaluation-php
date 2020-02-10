<div class="grid-x grid-padding-x">
    <div class="large-12 cell">
        <h2>Đánh giá năng lực</h2>
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

            <form method="post" action="">
            <?php $header = 0; $subheader = 0; $outnum = 0; foreach ($evaluations as $outcome): ?>
                <tr>
                    <?php if ($outcome->can_evaluate): ?>
                        <td>
                            <a href="#" style="margin-left: 20px;">
                                <?php echo $header . "." . $subheader . "." . ++$outnum . ". " . $outcome->title; ?>
                            </a>
                        </td>
                        <td>
                        </td>
                        <td>
<!--                            <a href="index.php?page=outcomes/delete&id=--><?php //echo $outcome->id; ?><!--" class="alert button">Xoá</a>-->
                            <p><?= $outcome->evaluate; ?></p>
                        </td>
                    <?php elseif ($outcome->parent_id != 0): ?>
                        <td>
                            <h5><?php echo $header . "." . ++$subheader . ". " . $outcome->title; $outnum = 0; ?></h5>
                        </td>
                        <td></td>
                        <td>
<!--                            <a href="index.php?page=outcomes/add_many_outcomes&template_id=--><?//= $template_id; ?><!--&parent_id=--><?//= $outcome->id; ?><!--" class="button secondary">Thêm chuẩn</a>-->
                        </td>

                    <?php else: ?>
                        <td><h3><?php echo  ++$header . " - " . $outcome->title; $subheader = 0; ?></h3></td>

                        <td></td>
                        <td>
<!--                            <a href="index.php?page=outcomes/add_subheader&template_id=--><?//= $template_id; ?><!--&parent_id=--><?//= $outcome->id; ?><!--" class="button">Thêm mục nhỏ</a>-->
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>

            </form>
            </tbody>
        </table>

    </div>
</div>
