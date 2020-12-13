<?php if ($pages_count > 1): ?>
    <ul class="pager-list">
        <?php foreach ($pages as $page): ?>
            <li class="pager-button<?php if ($page == $cur_page): ?> pager-button-active<?php endif; ?>">
                <a href="/?page=<?=$page;?>"><?=$page;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>