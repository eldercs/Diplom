<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset = "UTF-8">
        <meta name ="viewport" content="width=device-width,intial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
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
                    <li class = "add-number"><a href =  "add.php" class = "nav-button">Добавить номер</a></li>
                    <li class = "register"><a href = "sign-up.php" class = "nav-button">Зарегистрироваться</a></li>
                    <li class = "auto"><a href = "login.php" class = "nav-button">Авторизоваться</a></li>
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
    <main class = "main-page">
        <form class = "scan" action="#" method="get">
            <input type="search" class = "scan-input" id = "search" name="search" placeholder="Поиск:" autocomplete="off">
            <label for="scan" class = "label__price">Цена</label>
            <input type="search" class = "scan-price" id = "search" name="search" placeholder="от:" autocomplete="off">
            <input type="search" class = "scan-price" id = "search" name="search" placeholder="до:" autocomplete="off">
            <label for="scan-input" class = "scan-icon"></label>
            <input class="scan-btn" type="submit" name="find" value="Найти">
        </form>
        <hr class="hr-shelf">
        
        <section class = "main-like">
            <h2>Дома которые нравятся гостям</h2>
            <ul class = "lots__list">
                <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="/build/img/1.jpg" width="350" height="260" alt="Home1">
                    </div>
                    <div class="lot__info">
                      <h3 class="lot__title"><a class="text-link" href="number.html">Luxur 3 Bedroom</a></h3>
                      <span class="lot__country">Париж</span>
                      <div class="lot__state">
                        <div class="lot__rate">
                          <span class="lot__cost">От 15 999<b class="rub">р</b></span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="/build/img/3.jpg" width="350" height="260" alt="Home1">
                    </div>
                    <div class="lot__info">
                      <h3 class="lot__title"><a class="text-link" href="number.html">Luxur 3 Bedroom</a></h3>
                      <span class="lot__country">Париж</span>
                      <div class="lot__state">
                        <div class="lot__rate">
                          <span class="lot__cost">От 15 999<b class="rub">р</b></span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="/build/img/4.jpg" width="350" height="260" alt="Home1">
                    </div>
                    <div class="lot__info">
                      <h3 class="lot__title"><a class="text-link" href="number.html">Luxur 3 Bedroom</a></h3>
                      <span class="lot__country">Париж</span>
                      <div class="lot__state">
                        <div class="lot__rate">
                          <span class="lot__cost">От 15 999<b class="rub">р</b></span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="/build/img/2.jpg" width="350" height="260" alt="Home3">
                    </div>
                    <div class="lot__info">
                      <h3 class="lot__title"><a class="text-link" href="number.html">Luxur 3 Bedroom</a></h3>
                      <span class="lot__country">Париж</span>
                      <div class="lot__state">
                        <div class="lot__rate">
                          <span class="lot__cost">От 15 999<b class="rub">р</b></span>
                        </div>
                        
                      </div>
                    </div>
                  </li>
                  <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="/build/img/6.jpg" width="350" height="260" alt="Home">
                    </div>
                    <div class="lot__info">
                      <h3 class="lot__title"><a class="text-link" href="number.html">Luxur 3 Bedroom</a></h3>
                      <span class="lot__country">Париж</span>
                      <div class="lot__state">
                        <div class="lot__rate">
                          <span class="lot__cost">От 15 999<b class="rub">р</b></span>
                        </div>
                       
                      </div>
                    </div>
                  </li>
                  
            </ul>
        </section>
    </main>
    <footer class = "page-footer">
        <div class = "main__footer">
            <p>© 2020-2021 Комания «Dadayan» <br>
                Все права защищены
            </p>
            <ul class = "social">
                <li>
                    <a href= "#" class = "vk-icon" alt = "ВКонтакте"><img src="/build/img/vk.svg" alt="vk" height = "30"></a>
                </li>
                <li>
                    <a href="#" class = "telegram-icon" alt = "Telegram" ><img src="/build/img/telegram.svg" alt="telegram" height = "25" width = "25"></a>
                </li>
            </ul>
            <div class = "email">
             <p>Обратная связь:</p>
             <p class = "email__grow">deny_1999@Ukr.net</p>
            </div> 
            <div class="develop">
                <p>Разработано -  <br><p1>denis.ua</p1></p>
            </div>
        </div>
    </footer>
    </body>
</html>
