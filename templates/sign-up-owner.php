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
                  <label for="name">Название организации*</label>
                  <input id="name" type="text" name="name" placeholder="Введите название организации">
                  <!-- <span class="form__error2"><?=isset($errors['name'])? $errors['name'] : "";?></span> -->
                </div>
                <div class="form__item form__container">
                  <label for="telephone">Телефон*</label>
                  <input id="telephone" type="number" name="telephone" placeholder="Введите ник">
                  <!-- <span class="form__error2"><?=isset($errors['username'])? $errors['username'] : "";?></span> -->
                </div>  
                <div class = "sign-up__button">
                <!-- <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span> -->
                  <button type="submit" class="button red__button">Зарегистрироваться</button>
                 
                  <a class="text-link" href="/login.php">Уже есть аккаунт</a>
                </div>
</form>