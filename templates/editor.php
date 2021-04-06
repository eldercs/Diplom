<form action="update.php" method = "post" enctype="multipart/form-data">
<div>
    <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
    <!-- <h2 for="name">id: <?= $table_array['id'] ?></h2> -->
        <h2 for="name">Название</h2>
        <input id="name" class = "item-name" type="text" name="title" placeholder="Введите название заведения" required value="<?=$table_array['title'];?>">
    </div>
        <div class="lot__image">
           <!--  <label for="image">Изображение</label> -->
            <img src="<?=$table_array['title_image'];?>" width="600"  alt="Home1">
        </div>
        <div class="form__item form__item--file form__item--last">
            <input  type="file" name="img" id="input__file" class="input input__file">
            <label for="input__file" class="input__file-button">
                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
                <span class="input__file-button-text">Выберите файл</span>
            </label>
        <script src = "src/js/file_load.js">  </script>
        <span class="form__error2"><?=isset($errors['img'])? $errors['img'] : "";?></span>
    </div>    
    </div>
    <div>
        <h2>Описание</h2>
        <div>
        <div class = "form__item">
          <label for ="price">Цена</label>
          <input id ="price" class ="add-price" type="number" name="price" placeholder="0" required value="<?=$table_array['price'];?>">
        </div>
        <div class="form__item form__item--small">
          <label for="city">Город</label>
          <input id="city" class = "item-city" type="text" name="city" placeholder="Введите город" required value="<?=$table_array['city']; ?>">
        </div>
        <div class="form__item form__item--wide">
            <label for="description">Описание</label>
            <textarea id="description" class = "description" name="description" placeholder="Напишите описание номера" required><?=$table_array['description']; ?></textarea>
        </div>
        <!-- <div>
            <span class="hotel__city"><?= htmlspecialchars($table_array['city']);?></span>
            <span class="hotel__cost">От <?= htmlspecialchars($table_array['price']);?><b class="rub">р</b></span>
            <span class="hotel__description"><?= htmlspecialchars($table_array['description']);?></span>
        </div> -->
    </div>
        <p>
        <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />
        </p>
    </div>
    <button type="submit" class="add__button red__button">Сохранить</button>
</form>
