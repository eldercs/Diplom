
<section class="lots container">
    <div class="lots__header">
        <h2>Результаты поиска по запросу <?=$search;?></h2>
    </div>
    <?php if(count($hotels)): ?>
        <?=shablon('all-hotel', ['hotels' => $hotels, 'image' => $image]); ?>
    <?php else: ?>
        <div>По вашему запросу ничего не найдено</div>
    <?php endif; ?>
</section>