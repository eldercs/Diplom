<form class="form form--add-lot add-container form--invalid"  action="add.php" method="post"enctype="multipart/form-data"> <!-- form--invalid -->
  <h2>Добавление номера</h2>
    <div class="form__container-two">
        <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
          <label for="name">Название</label>
          <input id="name" class = "item-name" type="text" name="name" placeholder="Введите название заведения" required value="<?= isset($_POST['name'])? $_POST['name'] : ''; ?>">
                <!-- <span class="form__error">Введите наименование лота</span> -->
        </div>
        <div class="form__item">
          <label for="category">Категория</label>
          <select id="category" name="category" required>
          <option value = "">Выберите категорию</option>
          <?php
            foreach($my_array as $key) : ?>
            <option name = "category" value="<?=$key['id']; ?>"><?=$key['title'];?></option>
          <?php endforeach; ?>
          </select>
               <!--  <span class="form__error">Выберите категорию</span> -->
        </div>
        <div class = "form__item">
          <label for ="price">Цена</label>
          <input id ="price" class ="add-price" type="number" name="price" placeholder="0" required value="<?= isset($_POST['price'])? $_POST['price'] : ''; ?>">
        </div>
      </div>
      <div class="form__item form__item--small">
          <label for="city">Город</label>
          <input id="city" class = "item-city" type="text" name="city" placeholder="Введите город" required value="<?= isset($_POST['city'])? $_POST['city'] : ''; ?>">
                <!--  <span class="form__error">Введите шаг ставки</span>  -->
      </div>
      <div class="form__item form__item--wide">
        <label for="description">Описание</label>
        <textarea id="description" class = "description" name="description" placeholder="Напишите описание номера" required value="<?= isset($_POST['description'])? $_POST['description'] : ''; ?>"></textarea>
              <!-- <span class="form__error">Напишите описание номера</span> -->
      </div>
    <div class="form__item form__item--file form__item--last">
      <label>Изображение</label>
       <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="<?=isset($gif['img'])? $gif['img'] : '';?>" width="113" height="113" alt="Изображение номера">
        </div>
      </div> 
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name = "img" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <span class="form__error2"><?=isset($errors['img'])? $errors['img'] : "";?></span>
    </div>           
  <button type="submit" class="add__button red__button">Добавить лот</button>
</form>
    