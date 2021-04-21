<section>
    <div>
    <h2><?=htmlspecialchars($table_array['title']);?></h2>
        <div class="lot__image">
           <img src="<?=$table_array['title_image'];?>" width="600"  alt="Home1">
          <!--  <?=htmlspecialchars($table_array['title_image']);?> -->
          
        </div>
        
        </div>
    <div class = "container2">
    <br>
    <?php foreach($hotel_image as $image): ?>
           <?php if($image){?>
                <a href="<?=$image;?>" data-lightbox="test"><img src="<?=$image;?>"  class = "hotel_gallery" alt="Home1"></a>
           <?php }?>
    <?php endforeach ?>
    <br>
    <a href="editor.php?key=<?=$table_array['id']; ?>">Редактировать</a>
        <h2>Описание</h2>
        <div>
            <span class="hotel__category"><?= htmlspecialchars($table_array['category']);?></span>
            <br>
            <span class="hotel__city"><?= htmlspecialchars($table_array['city']);?></span>
            <br>
            <span class="hotel__cost">От <?= htmlspecialchars($table_array['price']);?><b class="rub">р</b></span>
            <br>
            <span class="hotel__description"><?= htmlspecialchars($table_array['description']);?></span>
        </div>
    </div>
    <div class = "hotel__comments">
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
            <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />
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
        <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />

        </p>
    </div>
    <script src = "src/js/lightbox-plus-jquery.js">  </script>
</section>
