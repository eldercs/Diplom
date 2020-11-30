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
                  <label for="message">Контактные данные*</label>
                  <textarea id="message" class = "message__text" name="contacts" placeholder="Напишите как с вами связаться"></textarea>
                  <!-- <span class="form__error2"><?=isset($errors['contacts'])? $errors['contacts'] : "";?></span> -->
                </div>
                <div class="form__item form__item--file form__item--last">
                  <label>Аватар</label>
                  <div class="preview">
                    <button class="preview__remove" type="button">x</button>
                    <div class="preview__img">
                      <img src="#" width="113" height="113" alt="Ваш аватар">
                    </div>
                  </div>
                  <div class="form__input-file">
                    <input class="visually-hidden" type="file" id="photo2" name = "avatar">
                    <label for="photo2">
                      <span>+ Добавить</span>
                    </label>
                  </div>
                  <span class="form__error2"></span>
                </div>
                <!-- <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span> -->
                <button type="submit" class="button red__button">Зарегистрироваться</button>
    <a class="text-link" href="/login.php">Уже есть аккаунт</a>
</form>
      
    