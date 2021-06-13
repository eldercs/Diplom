 <form class="form container-register"  method="post" enctype="multipart/form-data"> 
    <h2>Регистрация нового аккаунта</h2>
                <div class="form__item form__container">
                  <label for="email">E-mail*</label>
                  <input id="email" type="text" name="email" placeholder="Введите e-mail" require>
                  <span class="form__error2"><?=isset($errors['email'])? $errors['email'] : "";?></span>
                </div>
                <div class="form__item form__container">
                  <label for="password">Пароль*</label>
                  <input id="password" type="password" name="password" placeholder="Введите пароль" require>
                  <span class="form__error2"><?=isset($errors['password'])? $errors['password'] : "";?></span>
                </div>
                <div class="form__item form__container">
                  <label for="name">Имя*</label>
                  <input id="name" type="text" name="name" placeholder="Введите имя" require>
                  <span class="form__error2"><?=isset($errors['name'])? $errors['name'] : "";?></span>
                </div>
                <div class="form__item form__container">
                  <label for="telephone">Телефон*</label>
                  <input id="telephone" type="number" name="telephone" placeholder="Введите телефон" require>
                  <!-- <textarea id="message" class = "message__text" name="contacts" placeholder="Напишите как с вами связаться"></textarea> -->
                  <span class="form__error2"><?=isset($errors['telephone'])? $errors['telephone'] : "";?></span> 
                </div>
                <div class="form__item form__item--file form__item--last">
                  <label>Аватар</label>
                  <br>
                  <img id="output" src="" onload="alert('Файл существует!');" max-height="100"  width="200" />
                  <input type='file' id="input__file" name="avatar"  class="input input__file" onchange="loadFile(event, 1)" require/>
                  <label for="input__file" class="input__file-button">
                    <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
                    <span class="input__file-button-text">Выберите файл</span>
                  </label>
                  <span class="form__error2"><?=isset($errors['avatar'])? $errors['avatar'] : "";?></span> 

                <!--   <div class="preview">
                    <button class="preview__remove" type="button">x</button>
                    <div class="preview__img">
                      <img src="<?=isset($gif['img'])? $gif['img'] : '';?>" width="113" height="113" alt="ава">
                    </div>
                  </div> 
                  <input type="file" name="avatar" id="input__file" class="input input__file">
                  <label for="input__file" class="input__file-button">
                  <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
                  <span class="input__file-button-text">Выберите файл</span>
                  </label> -->
                  <script src = "src/js/file_load.js"></script>
                  <span class="form__error2"></span>
                </div>
                
                <div class = "sign-up__button">
                <!-- <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span> -->
                  <button type="submit" class="button red__button">Зарегистрироваться</button>
                 
                  <a class="text-link" href="#openModal">Уже есть аккаунт</a>
                  <a class="text-link-min" href="/login.php">Уже есть аккаунт</a>
                </div>
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
    