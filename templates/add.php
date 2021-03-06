<form class="form form--add-lot add-container form--invalid"  action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
  <h2>Добавление номера</h2>
    <div class="form__container-two">
        <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
          <label for="name">Название</label>
          <input id="name" class = "item-name" type="text" name="name" placeholder="Введите название заведения" required value="<?= isset($_POST['name'])? $_POST['name'] : ''; ?>">
          <span class="form__error2"><?=isset($errors['name'])? $errors['name'] : "";?></span>
        </div>
        <div class="form__item">
          <label for="category">Категория</label>
          <select id="category" name="category" required>
          <option value = "">Выберите категорию</option>
          <?php
            foreach($my_array as $key) : ?>
            <option name = "category" value="<?=$key['id']; ?>"><?=$key['category'];?></option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class = "form__item">
          <label for ="price">Цена</label>
          <input id ="price" class ="add-price" type="number" name="price" placeholder="0" required value="<?= isset($_POST['price'])? $_POST['price'] : ''; ?>">
          <span class="form__error2"><?=isset($errors['price'])? $errors['price'] : "";?></span>
        </div>
      </div>
      <div class="form__item form__item-city">
          <label for="city">Город</label>
          <input id="city" class = "item-city" type="text" name="city" placeholder="Введите город" required value="<?= isset($_POST['city'])? $_POST['city'] : ''; ?>">
          <span class="form__error2"><?=isset($errors['city'])? $errors['city'] : "";?></span>
      </div>
      <div class="form__item form__item-description">
        <label for="description">Описание</label>
        <textarea id="description" class = "description" name="description" placeholder="Напишите описание номера" required value="<?= isset($_POST['description'])? $_POST['description'] : ''; ?>"></textarea>
        <span class="form__error2"><?=isset($errors['description'])? $errors['description'] : "";?></span>
      </div>
    <div class="form__item form__item--file form__item--last">
      <label>Изображение</label>
      <br>
      <img id="output" src=""  onload="alert('Файл существует!');" max-height="200"  width="250" />
      <input type='file' id="input__file" name="img"  class="input input__file" onchange="loadFile(event, 1)"/>
      <label for="input__file" class="input__file-button">
        <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
        <span class="input__file-button-text">Выберите файл</span>
      </label>
      <span class="form__error2"><?=isset($errors['img'])? $errors['img'] : "";?></span>

    </div>
    <!--   <input  type="file" name="img" id="input__file" class="input input__file">
      <label for="input__file" class="input__file-button">
        <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
        <span class="input__file-button-text">Выберите файл</span>
      </label> -->
<!-- </div> -->
      <script src = "src/js/file_load.js">  </script>

    </div>           
  <button type="submit" class="add__button red__button">Добавить лот</button>
</form>
<script>
  var loadFile = function(event, id) {
    if(id == 1)
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>