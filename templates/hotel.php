
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
        <?php if($username): ?>
        <form name="comment" action="comments.php" method="post">
            <p>
            <label>Имя: </label>
            <!-- <input type="text" name="name" /> -->
            <input type = "text" name = "name"  value ="<?=$username['name']; ?>"readonly >
            </p>
        <p>
            <label>Комментарий:</label>
            <br />
            <textarea name="comment" cols="100" rows="14"></textarea>
        </p>
        <p>
            <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array[$key]['id']); ?>" />
            <input type="submit" value="Отправить" />
        </p>
        </form>
        <?php endif; ?>
        <p>
            <label>Комментарии:</label>
            <?php
            foreach($comments as $com => $val): ?>
            <br />
            <p><?=htmlspecialchars($val['user']);?></p>
            <textarea name="comment" cols="100" rows="4"><?=htmlspecialchars($val['comment']);?></textarea>
            <?php endforeach ?>
        </p>
        <p>
        <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array[$key]['id']); ?>" />
        </p>
    </div>
</section>
