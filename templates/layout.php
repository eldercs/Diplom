<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset = "UTF-8">
        <meta name ="viewport" content="width=device-width,intial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <title><?= $title ?> </title>
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet"  href="/build/css/style.css" />
        <link rel="stylesheet" type="text/css" href="../dist/duDialog.css">
    </head>
    <body>
        <header class = "header">
            <div class = "header-top">
            <div class="main-header">
                <a href="index.php" class="header-logo">
                    <img src="/build/img/dadayan.png" alt="dadayan" class = "dadayan" >
                    <img src="/build/img/logomin.png" alt="dadayan" class = "dadayan-min" >
                </a>
                <?php if($username['role'] == 1): ?>
                    <a class = "link-notice" href="notice.php"><img src="/build/img/notice.png" width= "40" alt=""></a>
                <?php endif; ?>
                <ul class="header-item">
                <?php 
                if($username['role'] == 1){?>
                    <li class = "add-number"><a href = "add.php" class = "nav-button">Добавить номер</a></li>
                <?php }
                else if($username['role'] == 3){ ?>
                    <li class = "add-number"><a href = "list_users.php" class = "nav-button">Список всех пользоваетелей</a></li>
                <?php } ?>
                
                    <?php if($username): ?>
                    <div class = "user-image">
                        <img src="<?=$username['avatar']; ?>" width="40" height="40" alt="Пользователь">
                    </div>
                    <div class = "user-block">
                        <li><?=$username['name']; ?></li>
                        <li><a href="/logout.php">Выход</a></li>
                    </div>
                    <?php else: ?>
                    <li class = "register"><a href = "#modal-signup" class = "nav-button">Зарегистрироваться</a></li>
                    <li class = "auto"><a href = "#openModal" class = "nav-button">Авторизоваться</a></li>
                    <li class = "auto-min"><a href = "login.php" class = "nav-button">Авторизоваться</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            </div>
            <nav class = "header-nav">
                <section class="main-promo">
                    <h2 class = "visually-hidden">Навигация</h2>
                    <ul class="promo__list">
                  <?php
                    foreach($my_array as $key => $val){ ?>
                       <li class = "nav__item"><a href = "index.php?id=<?=$val['id']?>"> <?= $val['category']; ?></a></li>
                    <?php
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
                            <div class="modal__item">
                                <!-- <label for="email">E-mail*</label> -->
                                <input id="email" class ="modal-text login-email" type="text" name="email" placeholder="Введите e-mail" required>
                            </div>
                            <div class="modal__item form__item--last">
                               <!--  <label for="password">Пароль*</label> -->
                                <input id="password" class ="modal-text login-password" type="text" name="password" placeholder="Введите пароль" required>
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
            <div id = "modal-signup" class = "modal">
                <form action = "login.php"  method = "post" enctype="multipart/form-data">
                <div class = "modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Выберите тип учетное записи</h3>
                          <a href="#close" text="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="form_button">
                                <a class = "red__button" href="/sign-up-owner.php">Владалец номера</a>
                                <a class="red__button" href="/sign-up.php">Обычный пользователь</a>
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
     <nav class = "footer-nav">
        <h2 class = "visually-hidden">Навигация</h2>
        <ul class="promo__list">
            <?php
                foreach($my_array as $key => $val){ ?>
                     <li class = "nav__item-footer"><a href = "index.php?id=<?=$val['id']?>"> <?= $val['category']; ?></a></li>
                <?php
                }
                ?> 

         </ul>
        </nav>
        <div class = "main__footer">
            <p class = "company-contact">© 2020-2021 Комания «Dadayan» <br>
                Все права защищены
            </p>
            <ul class = "social">
                <li>
                    <!-- <a href= "#" class = "vk-icon"><img src="/build/img/vk.svg" alt="vk" height = "30"></a> -->
                    <a class="social__link social__link--vkontakte" href="#">
                        <svg width="45" height="45" viewBox="0 0 27 27" xmlns="http://www.w3.org/2000/svg"><circle stroke="#879296" fill="none" cx="13.5" cy="13.5" r="12.666"/><path fill="#879296" d="M13.92 18.07c.142-.016.278-.074.39-.166.077-.107.118-.237.116-.37 0 0 0-1.13.516-1.296.517-.165 1.208 1.09 1.95 1.58.276.213.624.314.973.28h1.95s.973-.057.525-.837c-.38-.62-.865-1.17-1.432-1.626-1.208-1.1-1.043-.916.41-2.816.886-1.16 1.236-1.86 1.13-2.163-.108-.302-.76-.214-.76-.214h-2.164c-.092-.026-.19-.026-.282 0-.083.058-.15.135-.195.225-.224.57-.49 1.125-.8 1.656-.973 1.61-1.344 1.697-1.51 1.59-.37-.234-.272-.975-.272-1.433 0-1.56.243-2.202-.468-2.377-.32-.075-.647-.108-.974-.098-.604-.052-1.213.01-1.793.186-.243.116-.438.38-.32.4.245.018.474.13.642.31.152.303.225.638.214.975 0 0 .127 1.832-.302 2.056-.43.223-.692-.167-1.55-1.618-.29-.506-.547-1.03-.77-1.57-.038-.09-.098-.17-.174-.233-.1-.065-.214-.108-.332-.128H6.485s-.312 0-.42.137c-.106.135 0 .36 0 .36.87 2 2.022 3.868 3.42 5.543.923.996 2.21 1.573 3.567 1.598z"/></svg>
                    </a>
                </li>
                <li>
                <a class="social__link social__link--telegramm" href="#">
                    <svg width="45" height="45" viewBox="0 0 27 27" xmlns="http://www.w3.org/2000/svg"><circle stroke="#879296" fill="none" cx="13.5" cy="13.5" r="12.666"/>
                    <svg x = "4" y = "4" width="19px" height="19px" viewBox="0 0 27 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><path id="telegram-1" fill="#879296" d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z"/></svg>
                    </svg> 
                    </a>
    
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
