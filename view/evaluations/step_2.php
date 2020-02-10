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
<!--            index.php?page=evaluations/step_2&template_id=--><?//= $template->id; ?><!--&student_id=--><?//= $student_id; ?>
            <form method="post" action="">
            <?php $header = 0; $subheader = 0; $outnum = 0; foreach ($outcomes as $outcome): ?>
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
                            <select name="evaluations[]">
                                <option value="<?= $outcome->id; ?>_0">N/A</option>
                                <option value="<?= $outcome->id; ?>_1">Chưa Đạt</option>
                                <option value="<?= $outcome->id; ?>_2">Đạt</option>
                            </select>
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

                <div class="form-group">
                    <button type="submit" value="" class="button">Thêm</button>
                    <a href="index.php?page=clazzes/list" class="button secondary">Huỷ</a>
                </div>
            </form>
            </tbody>
        </table>

    </div>
</div>
