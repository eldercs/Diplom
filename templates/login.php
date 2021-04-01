           <form class="form container-login"  method="post"> 
                <h2>Вход</h2>
                <div class="form__item">
                  <label for="email">E-mail*</label>
                  <input id="email" class ="login-email" type="text" name="email" placeholder="Введите e-mail" required>
                 <!--  <span class="form__error">Введите e-mail</span> -->
                </div>
                <div class="form__item form__item--last">
                  <label for="password">Пароль*</label>
                  <input type="text" id="password" class ="login-password" name="password" placeholder="Введите пароль" required>
                <!--   <span class="form__error">Введите пароль</span> -->
                </div>
                <button class = "button__login red__button" type="submit">Войти</button>
            </form>
