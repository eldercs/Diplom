<section class = "hotel-details">
<?php 
        if($username){
            $sql = mysqli_query(mysqli_connect("localhost", "root", "", "diplom"),"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND `id` = $table_array[id]");
            $result = mysqli_fetch_row($sql);
            if($result[0] > 0){ ?>
            <div class = "editor-redactor">
                <a href="editor.php?key=<?=$table_array['id']; ?>" class = "editor-redactor__text" >Редактировать</a>
                <a href="editor.php?key=<?=$table_array['id']; ?>" class = "editor-redactor__image"><img src = "./src/img/editor-hotel.png" width = "40" class = "editor-redactor__image"></a>
            </div>
                <? } 
        }?>
    <div>
        <h2 class = "editor__title"><?=htmlspecialchars($table_array['title']);?></h2> 
        <h3 class="editor__text hotel__category">Категории: <?= htmlspecialchars($table_array['category']);?></h3>
        <h3 class="editor__text hotel__city">Город <?= htmlspecialchars($table_array['city']);?></h3>
    
    
        <div class="hotel__image">
           <img src="<?=$table_array['title_image'];?>" width="1200"  alt="Home1">
          <!--  <?=htmlspecialchars($table_array['title_image']);?> -->
          
        </div>
        <?php foreach($hotel_image as $image): ?>
           <?php if($image){?>
                <a href="<?=$image;?>" data-lightbox="test"><img src="<?=$image;?>"  class = "hotel_gallery" alt="Home1"></a>
           <?php }?>
    <?php endforeach ?>
        </div>
    <div class = "editor-description">
    <div class = "container2">
    <br>
        <h2 class="editor__text editor__description">Описание</h2>
        <div>
           
            <br>
            <span class="editor__text hotel__cost">Цена: от <b class="rub"><?= htmlspecialchars($table_array['price']);?>р</b></span>
            <br>
            <?php
                function nl2br2($string) {
                $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
                return $string;
                }
            ?>
            <p class="editor__text editor__description-hotel"><?= nl2br2($table_array['description']);?></p>
        </div>
    </div>
    <?php 
       /*  $sql = mysqli_query(mysqli_connect("localhost", "root", "", "diplom"),"SELECT count(*) FROM `bron` WHERE `id_user` = $username[id] AND `id_creator` = $table_array[user_id]");
        $result = mysqli_fetch_row($sql); 
        echo($result[0]); */
         if($username['id']){ ?>
        <div class = "button-bron">
            <a href="#openModal3">Забронировать</a>
        </div>
        <? } 
        else{ ?>
            <div class = "button-bron">
                <a href="#openModal5" onclick="document.getElementById('openModal5').style.display='block'">Забронировать</a>
              <!--   <a href="#openModal5">Забронировать</a> -->
            </div>
       <? }?>
    </div>
    <div class = "hotel__comments">
        <?php if($username): ?>
        <form name="comment" action="comments.php" method="post">
            <p>
            <label class = "comment__text">Имя: </label>
            <!-- <input type="text" name="name" /> -->
            <input type = "text" class = "commnet__name" name = "name"  value ="<?=$username['name']; ?>"readonly >
            </p>
        <p>
            <label class = "comment__text">Комментарий:</label>
            <br />
            <textarea style="overflow:hidden;" maxlength="40" name="comment" class = "hotel__comments-text" rows = "4"></textarea>
        
        </p>
        <p>
            <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />
            <input class = "comment__button" type="submit" value="Отправить" />
        </p>
        </form>
        <?php endif; ?>
        <p>
            <label class = "comment__text">Комментарии:</label>
            
            <?php
            foreach($comments as $com => $val): ?>
            <br />
            <p class = "commnet__name"><?=htmlspecialchars($val['user']);?> <?=htmlspecialchars($val['date']);?></p>
            <div class = "hotel__comment">
                <p name="comment" class = "hotel__comments-text"><?=nl2br2($val['comment']);?></p>
            </div>
            <?php endforeach ?>
        </p>
        <p>
        <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />
        </p>
        <div id = "openModal3" class = "modal">
            <form action = "bron.php"  method = "post" enctype="multipart/form-data">
                <div class = "modal-dialog-bron">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Заполните поля для подтверждения бронирования</h3>
                          <a href="#close" text="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="modal__item form__item--last">
                               <!--  <label for="password">Пароль*</label> -->
                                <label for="surname">Введите вашу фамилию</label>
                                <input id="surname" class ="modal-text name-bron" type="text" name="surname" placeholder="Фамилия" required>
                            </div>
                            <div class="modal__item form__item--last">
                               <!--  <label for="password">Пароль*</label> -->
                                <label for="name">Введите ваше имя</label>
                                <input id="name" class ="modal-text name-bron" type="text" name="name" placeholder="Имя" required>
                            </div>
                            <div class="modal__item form__item--last">
                               <!--  <label for="password">Пароль*</label> -->
                                <label for="patronymic">Введите ваше отчество</label>
                                <input id="patronymic" class ="modal-text name-bron" type="text" name="patronymic" placeholder="Отчество" required>
                            </div>
                            <div class="modal__item">
                                <!-- <label for="email">E-mail*</label> -->
                                <label for="telephone">Введите ваш телефон</label>
                                <input id="telephone" class ="modal-text telephote-bron" type="number" name="telephone" placeholder="Телефон" required>
                            </div>
                            <input type = "hidden"  id="id_hotel" name = "id_hotel"  value="<?=$table_array['id'];?>" />
                            <div class="form_button">
                                <button class = "button__login red__button" type="submit">Подтвердить</button>
                                <a class="text-register" href="/index.php">Отмена</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id = "openModal4" class = "modal">
                <div class = "modal-dialog-bron modal-dialog-bron4">
                    <div class="modal-content">
                        <h3 class="modal-title">Заявка на бронирование отправлена!</h3> 
                        <a class="modal__ok red__button" href="/hotel.php?key=<?=$table_array['id'];?>">Ок</a>
                    </div>
                </div>
        </div>
        <div id = "openModal5" class = "modal">
                <div class = "modal-dialog-bron modal-dialog-bron4">
                    <div class="modal-content">
                        <h3 class="modal-title">Авторизуйтесь пожалуйста</h3> 
                        <a onclick = "document.getElementById('openModal5').style.display='none'" class="modal__ok red__button">Ок</a>
                    </div>
                </div>
        </div>
    </div>
    <script>
    var textarea = document.querySelector('textarea');

    textarea.addEventListener('keyup', function(){
    if(this.scrollTop > 0){
    this.style.height = this.scrollHeight + "px";
  }
});
</script>
    <?php
        function time2($string) {
            $day = $string + 60*60*24;
            $day2 = date('d . m .Y H:i:s', $day);
            return $day2;
        }
    ?>
    <script src = "src/js/lightbox-plus-jquery.js">  </script>
</section>
