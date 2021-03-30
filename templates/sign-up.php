 <form class="form container-register"  method="post" enctype="multipart/form-data"> 
    <h2>Регистрация нового аккаунта</h2>
                <div class="form__item form__container">
                  <label for="email">E-mail*</label>
                  <input id="email" type="text" name="email" placeholder="Введите e-mail" >
                  <!-- <span class="form__error2"><?=isset($errors['email'])? $errors['email'] : "";?></span> -->
                </div>
                <div class="form__item form__container">
                  <label for="password">Пароль*</label>
                  <input id="password" type="password" name="password" placeholder="Введите пароль" >
                  <!-- <span class="form__error2"><?=isset($errors['password'])? $errors['password'] : "";?></span> -->
                </div>
                <div class="form__item form__container">
                  <label for="name">Имя*</label>
                  <input id="name" type="text" name="name" placeholder="Введите имя">
                  <!-- <span class="form__error2"><?=isset($errors['name'])? $errors['name'] : "";?></span> -->
                </div>
                <div class="form__item form__container">
                  <label for="username">Ник*</label>
                  <input id="username" type="text" name="username" placeholder="Введите ник">
                  <!-- <span class="form__error2"><?=isset($errors['username'])? $errors['username'] : "";?></span> -->
                </div>
                <div class="form__item form__container">
                  <label for="message">Контактные данные*</label>
                  <textarea id="message" class = "message__text" name="contacts" placeholder="Напишите как с вами связаться"></textarea>
                  <!-- <span class="form__error2"><?=isset($errors['contacts'])? $errors['contacts'] : "";?></span> -->
                </div>
                <div class="form__item form__item--file form__item--last">
                  <label>Аватар</label>
                  <div class="preview">
                    <button class="preview__remove" type="button">x</button>
                    <div class="preview__img">
                      <img src="<?=isset($gif['img'])? $gif['img'] : '';?>" width="113" height="113" alt="Изображение номера">
                    </div>
                  </div> 
                  <input  type="file" name="img" id="input__file" class="input input__file">
                  <label for="input__file" class="input__file-button">
                  <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
                  <span class="input__file-button-text">Выберите файл</span>
                  </label>
                  <span class="form__error2"></span>
                </div>
                <script src = "src/js/file_load.js">
                </script>
                <!-- <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span> -->
                <button type="submit" class="button red__button">Зарегистрироваться</button>
    <a class="text-link" href="/login.php">Уже есть аккаунт</a>
</form>
      
    