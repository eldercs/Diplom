<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset = "UTF-8">
        <meta name ="viewport" content="width=device-width,intial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <title><?= $title ?> </title>
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                    <?php if($username): ?>
                    <li><?=$username['name']; ?></li>
                    <li><a href="/logout.php">Выход</a></li>
                    <?php else: ?>
                    <li class = "register"><a href = "sign-up.php" class = "nav-button">Зарегистрироваться</a></li>
                    <li class = "auto"><a href = "#openModal" class = "nav-button">Авторизоваться</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            </div>
            <nav class = "header-nav">
                <section class="main-promo">
                    <h2 class = "visually-hidden">Навигация</h2>
                    <ul class="promo__list">
                    <?php
                    foreach($my_array as $key => $val){
                    print('<li class = "nav__item"><a href = "all-lots.html">' . $val['title']. '</a></li>' );
                    }
                    ?>
                    </ul>
                </section>
            </nav>
            <div id = "openModal" class = "modal">
                <form action = "login.php"  method = "post" enctype="multipart/form-data">
                <div class = "modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Авторизация</h3>
                          <a href="#close" text="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="form__item">
                                <label for="email">E-mail*</label>
                                <input id="email" class ="login-email" type="text" name="email" placeholder="Введите e-mail" required>
                            </div>
                            <div class="form__item form__item--last">
                                <label for="password">Пароль*</label>
                                <input id="password" class ="login-password" type="text" name="password" placeholder="Введите пароль" required>
                            </div>
                            <div class="form_button">
                                <button class = "button__login red__button" type="submit">Войти</button>
                                <a class="text-register" href="/sign-up.php">Зарегистрироваться</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </form>
            </div>
        </header>
    <main class = "container">
        <?=$page_content;?>
    </main>
    <footer class = "page-footer">
        <div class = "main__footer">
            <p>© 2020-2021 Комания «Dadayan» <br>
                Все права защищены
            </p>
            <ul class = "social">
                <li>
                    <a href= "#" class = "vk-icon"><img src="/build/img/vk.svg" alt="vk" height = "30"></a>
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
