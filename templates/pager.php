<?php if ($pages_count > 1): ?>
    <ul class="pager-list">
        <?php foreach ($pages as $page): ?>
            <li class="pager-button<?php if ($page == $cur_page): ?> pager-button-active<?php endif; ?>">
                <?php if($id > 0){ ?>
                    <a href="/?page=<?=$page;?>&id=<?=$id?>"><?=$page;?></a>
                <?php }else{ ?>
                <a href="/?page=<?=$page;?>"><?=$page;?></a>
                <?php } ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>