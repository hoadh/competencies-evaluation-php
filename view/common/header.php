
<div class="top-bar-container" data-sticky-container>
    <div class="sticky sticky-topbar" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
        <div class="top-bar">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li class="menu-text">Đánh Giá Năng Lực</li>
                    <li class="has-submenu">
                        <a href="index.php?page=templates/list">Template</a>
                        <ul class="submenu menu vertical" data-submenu>
                            <li><a href="index.php?page=templates/list">Quản lý template</a></li>
                            <li><hr></li>
                            <?php foreach ($templates_header as $template): ?>
                            <li><a href="index.php?page=cat_outcomes/list&template_id=<?= $template->id; ?>"><?= $template->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="index.php?page=programs/list">Chương trình học</a></li>
                    <li><a href="index.php?page=clazzes/list">Lớp & Học viên</a></li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><input type="search" placeholder="Search"></li>
                    <li><button type="button" class="button">Search</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

