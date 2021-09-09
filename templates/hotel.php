<script>
    $(document).ready(function() {
	    $('button#comment__button').click(function(){
		    addComment('comment__button', $(this));
            /* alert("test"); */
	    });
    });
    function addComment(type, element){
        var user = $('#user').val();
        var id_hotels = element.parent().find('#id_hotels').val();
        var user_comment = $('#hotel__comments-text').val();
        $.ajax({
            type: "POST",
            url: "/comments.php",
            data:{
                'user' : user,
                'id_hotels' : id_hotels,
                'user_comment' : user_comment,
            },
            dataType: "json",
            success: function(date){

                /* let div = document.createElement('div');
                div.innerHTML = "<p>Test</p>"
                comment.before(div) */
                /* alert(date.error); */
                if(date.error != true){
                    start.insertAdjacentHTML('afterend', `<div class = "hotel__comment"><p class = "hotel__comments-text">${date.comment}</p></div>`);
                    start.insertAdjacentHTML('afterend', `<p class = "commnet__name">${date.user} ${date.day}</p>`);
                }
            }
        });
    }
</script>
<section class = "hotel-details">
<?php
/* echo $table_array['id']; */
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
        if($username['id']){ ?>
        <div class = "button-bron">
            <?php
            $sql = mysqli_query(mysqli_connect("localhost", "root", "", "diplom"),"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND `id` = $table_array[id]");
            $result = mysqli_fetch_row($sql);
            if($result[0] == 0){ ?>
                <a href="#openModal3">Забронировать</a>
            <? }?>
        </div>
        <? }
        else{ ?>
            <div class = "button-bron">
                <a href="#openModal5" onclick="document.getElementById('openModal5').style.display='block'">Забронировать</a>
            </div>
       <? }?>
    </div>
    <div id = "app" class = "hotel__comments">
        <?php if($username): ?>
        <!-- <form  name="comment" action="comments.php" method="post" @submit="submitHandler" > -->
            <p>
            <label class = "comment__text">Имя: </label>
            <!-- <input type="text" name="name" /> -->
            <input type = "text" id = "user" class = "commnet__name" name = "name"  value ="<?=$username['name']; ?>"readonly >
            </p>
        <p>
            <label class = "comment__text">Комментарий:</label>
  <!--           <h2>Новый комментарий: {{age}}</h2> -->
            <br />
            <textarea v-model = "comment" id = "hotel__comments-text" style="overflow:hidden;" maxlength="40" name="comment" class = "hotel__comments-text" rows = "4"></textarea>

        </p>
        <p>
            <input type="hidden" id="id_hotels" value="<?=$table_array['id'];?>" />
            <input type="hidden"  name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />
            <button class = "comment__button" id = "comment__button">Отправить</button>
        </p>

        <!-- </form> -->
        <?php endif; ?>
        <template>
        <p>
            <label id = "start" class = "comment__text">Комментарии:</label>

            <?php
            foreach($comments as $com => $val): ?>
            <!-- <br /> -->
            <p  class = "commnet__name"><?=htmlspecialchars($val['user']);?> <?=htmlspecialchars($val['date']);?></p>
            <div class = "hotel__comment">
                <p id = "new_comment" name="comment" class = "hotel__comments-text"><?=nl2br2($val['comment']);?></p>
            </div>
            <?php endforeach ?>
        </p>
        </template>
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
                                <input id="surname" class ="modal-text name-bron" type="text" name="surname" placeholder="Фамилия">
                                <span class="form__error"><?=isset($errors['surname'])? $errors['surname'] : "";?></span>
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
        var vue = new Vue({
            el: '#app',
            data:{
                message: "TDAD",
                comment: '',
                errors:{
                    comment: null
                }
            },
            methods:{
                submitHandler(){
                    if(this.formValid()){
                        console.log(this.formValid())
                        return true
                    }
                    event.preventDefault()
                    return false
                },
                formValid(){
                    let valid = true;
                    if(this.comment.length === 0){
                        this.errors.comment = "Введите ваш комментарий"
                        valid = false
                    }
                    else{
                        this.errors.comment = null
                    }
                    return valid
                }
            }
        })
    </script>
    <script>
    var textarea = document.querySelector('textarea');

    textarea.addEventListener('keyup', function(){
    if(this.scrollTop > 0){
    this.style.height = this.scrollHeight + "px";
  }
});
    <?php
        function time2($string) {
            $day = $string + 60*60*24;
            $day2 = date('d . m .Y H:i:s', $day);
            return $day2;
        }
    ?>
    </script>
    <script src = "src/js/lightbox-plus-jquery.js"></script>
</section>
