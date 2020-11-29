<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset = "UTF-8">
        <meta name ="viewport" content="width=device-width,intial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>dada</title>
        <link rel="stylesheet"  href="/build/css/style.css" />
    </head>
    <body>
        <header class = "header">
            <div class = "header-top">
            <div class="main-header">
                <a href="index.php" class="header-logo">
                    <img src="/build/img/dadayan.png" alt="dadayan" class = "dadayan"  >
                    <!-- <svg class = "dadayan"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="35px" height="39px">
                   <image  x="0px" y="0px" width="35px" height="39px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAnCAMAAACylgF9AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAq1BMVEXm4Jrp5Kf////7++zJ2Yv+/vr39tnX4KXc5a/z9NPJ14nM2Y/LxATr6J/T3qDAzme+xSzDxBe9yUzFxBO8x0e8yEm+xTTBxCDIxAu3uxpldTJ6ijS2uxt7jDORoDAlQ069vhWPnjG+vxPAvxFygjOHlzKHmDLAxCK9yU69yEfG1YDc5K+/xCq+y1y9xjm9ylS/zWHKxAfs78nAxCTW4KXY4qm/zWTn7MDL2IwEY/Z7AAAAAWJLR0QCZgt8ZAAAAAd0SU1FB+QLFhIdLwi87D0AAAEGSURBVDjLtdRpU8IwEAbg7iqvB4G2XkAVUcATFTkU//8vM2ntmKabhmGG/dDpJE93J80mUbRDUFhQyGjBFCLMHEhkiEHkr0iFKWFDmn8VNjJyjIhcw1sZB5n1cjMSQK2aTQ4OWwwcHZ8AdiKKTgEYALRVpxsnykR6ZhvokfPk4vKqp1TcV2WkrhFiO0NhwzUzyK6LuZts6DO3o+wuf7kfZWOPmUwfijzj6aMvTy2eKiYVzbO9Ln4Rzav9f3gmkTfYhvAumFll44nxYU3O8+dnZd9N/yDWw3Fec7HUH6zWcBrRIHx9A3Mdbd78LFFv6GCrSkg8qtWu9x358nA03Qp/LHhP7TF+AWDzGA9M0+ibAAAAAElFTkSuQmCC" />
                   </svg> -->
                </a>

            
                <ul class="header-item">
                    <li class = "add-number"><a href =  "nothing.php" class = "nav-button">Добавить номер</a></li>
                    <li class = "register"><a href = "sign-up.php" class = "nav-button">Зарегистрироваться</a></li>
                    <li class = "auto"><a href =  "login.php" class = "nav-button">Авторизоваться</a></li>
                </ul>
            </div>
            </div>
            <nav class = "header-nav">
                <section class="main-promo">
                    <h2 class = "visually-hidden">Навигация</h2>
                    <ul class="promo__list">
                        <li class="promo__item promo__item--otel">
                            <a class="promo__link" href="all-lots.html">Отели</a>
                        </li>
                        <li class="promo__item promo__item--apartmen">
                            <a class="promo__link" href="all-lots.html">Апартаменты/квартиры</a>
                        </li>
                        <li class="promo__item promo__item--kyrort">
                            <a class="promo__link" href="all-lots.html">Курортные отели</a>
                        </li>
                        <li class="promo__item promo__item--villa">
                            <a class="promo__link" href="all-lots.html">Виллы</a>
                        </li>
                        <li class="promo__item promo__item--shale">
                            <a class="promo__link" href="all-lots.html">Шале</a>
                        </li>
                        <li class="promo__item promo__item--cotege">
                            <a class="promo__link" href="all-lots.html">Котеджи</a>
                        </li>
                    </ul>
                </section>
            </nav>
        </header>
        <main>
        <form class="form form--add-lot add-container form--invalid" action="https://echo.htmlacademy.ru" method="post"> <!-- form--invalid -->
            <h2>Добавление номера</h2>
            <div class="form__container-two">
              <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
                <label for="lot-name">Название</label>
                <input id="lot-name" class = "item-name" type="text" name="lot-name" placeholder="Введите название заведения" required>
                <!-- <span class="form__error">Введите наименование лота</span> -->
              </div>
              <div class="form__item">
                <label for="category">Категория</label>
                <select id="category" name="category" required>
                  <option>Отели</option>
                  <option>Апартаменты/квартиры</option>
                  <option>Курортные отели</option>
                  <option>Виллы</option>
                  <option>Шале</option>
                  <option>Котеджи</option>
                </select>
               <!--  <span class="form__error">Выберите категорию</span> -->
              </div>
              <div class = "form__item">
                <label for="lot-rate">Цена</label>
                <input id="lot-rate" class ="add-price" type="number" name="lot-rate" placeholder="0" required>
            </div>
            </div>
            <div class="form__item form__item--small">
                <label for="lot-city">Город</label>
                    <input id="lot-city" class = "item-city" type="text" name="lot-city" placeholder="Введите город" required>
                <!--  <span class="form__error">Введите шаг ставки</span>  -->
            </div>
            <div class="form__item form__item--wide">
              <label for="message">Описание</label>
              <textarea id="message" class = "description" name="message" placeholder="Напишите описание номера" required></textarea>
              <!-- <span class="form__error">Напишите описание номера</span> -->
            </div>
            <div class="form__item form__item--file"> <!-- form__item--uploaded -->
              <div class="form__input-file">
                <div class = "add-img">
                    <label>Изображение</label>
                    <input class="visually-hidden" type="file" id="photo2">
                    <label for="photo2">
                    <span>+ Добавить</span>
                    </label>
                </div>
              </div>
            </div>
            <!-- <div class="form__container-three">
              <div class="form__item form__item--small">
                <label for="lot-rate">Цена</label>
                <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
                <span class="form__error">Введите начальную цену</span> 
              </div> -->
              <!-- <div class="form__item form__item--small">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
                 <span class="form__error">Введите шаг ставки</span> 
              </div> -->
             <!--  <div class="form__item">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date" required>
                <span class="form__error">Введите дату завершения торгов</span> 
              </div> -->
           <!--      -->
            <!-- <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span> -->
            <button type="submit" class="add__button red__button">Добавить лот</button>
          </form>
        </main>
        <footer class = "page-footer">
            <div class = "main__footer">
                <p>© 2020-2021 Комания «Dadayan» <br>
                    Все права защищены
                </p>
                <ul class = "social">
                    <li>
                        <a href= "#" class = "vk-icon" ><img src="/build/img/vk.svg" alt="vk" height = "30"></a>
                    </li>
                    <li>
                        <a href="#" class = "telegram-icon"><img src="/build/img/telegram.svg" alt="telegram" height = "25" width = "25"></a>
                    </li>
                </ul>
                <div class = "email">
                 <p>Обратная связь:</p>
                 <p class = "email__grow">deny_1999@Ukr.net</p>
                </div> 
                <div class="develop">
                    <p>Разработано -  <br></p><p>denis.ua</p>
                </div>
            </div>
        </footer>
        </body>
    </html>
    