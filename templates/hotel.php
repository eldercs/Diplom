<section>
    <div>
    <h2><?=htmlspecialchars($table_array[$key]['title']);?></h2>
        <div class="lot__image">
            <img src="<?=$table_array[$key]['img'];?>" width="600"  alt="Home1">
        </div>
    </div>
    <div>
        <h2>Описание</h2>
        <div>
            <span class="hotel__city"><?= htmlspecialchars($table_array[$key]['city']);?></span>
            <span class="hotel__cost">От <?= htmlspecialchars($table_array[$key]['price']);?><b class="rub">р</b></span>
            <span class="hotel__description"><?= htmlspecialchars($table_array[$key]['description']);?></span>
        </div>
    </div>
</section>
