
<script>
$(document).ready(function() {
	$('button#like').click(function(){

		setVote('like', $(this));
    //alert("test");
	});
});

// type - тип голоса. Лайк или дизлайк
// element - кнопка, по которой кликнули
function setVote(type, element){
	// получение данных из полей
	var id_user = $('#id_user').val();
	var id_hotels = element.parent().find('#id_hotels').val();

	$.ajax({
		// метод отправки
		type: "POST",
		// путь до скрипта-обработчика
		url: "/likes_test.php",
		// какие данные будут переданы
		data: {
			'id_hotels': id_hotels,
			'id_user': id_user,
			'type': type
		},
		// тип передачи данных
		dataType: "json",
		// действие, при ответе с сервера
		success: function(data){
			// в случае, когда пришло success. Отработало без ошибок
			if(data.result == 'success'){
				// Выводим сообщение
				//alert('Голос засчитан');
				// увеличим визуальный счетчик
				var count = parseInt(element.find('b').html());
				element.find('b').html(count+1);
			}else{
				// вывод сообщения об ошибке
				var count = parseInt(element.find('b').html());
				element.find('b').html(count-1);
			}
		}
	});
}
</script>

        <form class = "scan" action="search.php" method="get">
            <input type="search" class = "scan-input" id = "search" name="search" placeholder="Поиск:" autocomplete="off">
            <input type="search" class = "scan-city" id = "city_search" name="city_search" placeholder="Город:" autocomplete="off">
            <br class = "br-min">
            <label for="search" class = "label__price">Цена</label>
            <input type="search" class = "scan-price" id = "price_search" name="price_search" placeholder="от:" autocomplete="off">
            <input type="search" class = "scan-price" id = "price_search2" name="price_search2" placeholder="до:" autocomplete="off">
           <!--  <label for="scan-input" class = "scan-icon"></label> -->
            <input class="scan-btn" type="submit" name="find" value="Найти">
        </form>
        <hr class="hr-shelf">
        <section class = "main-like">
            <h2 class = "lots-title">Дома которые нравятся гостям</h2>
            <?php if($username['role'] == 1): ?>
              <a href="index.php?iduser=<?=$username['id']?>" class = "user__button red__button">Отобразить свои номера</a>
            <?php endif; ?>
            <ul class = "lots__list">
            <?php $i = 0;
            foreach($like_post as $val2): ?>
              <li class = "l<?=$i;?> <?php if($i == 0){ ?> slide-show <? }?>">
              <?php $i++; ?>
              <div class="lot__image">
                      <img src="<?= $val2['title_image'];?>" class = "hotel-image"  alt="Home1">
                      <?php
                      if($username){
                      $sql = mysqli_query(mysqli_connect("localhost", "root", "", "diplom"),"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND `id` = $val2[id]");
                      $result = mysqli_fetch_row($sql);
                      if($result[0] > 0){ ?>
                      <a href = "#openModal2<?=$val2['id'];?>" class = "parent-del" text="Close"><img src = "/src/img/delete_button.svg" class = "delete_hotel"><span class = "dop-del">x</span></a>

                      <? }
                      }?>

                    </div>
                    <div class="lot-info">
                    <p class="lot__title lot__text"><?= $val2['title'];?></p>
                      <div class="lot__state">

                        <p class = "lot__text lot__category"><?= $val2['category'];?></p>
                        <p class="lot__country lot__text"><?= $val2['city'];?></p>
                        <p class="lot__cost lot__text">От <?= $val2['price'];?><b class="rub">р</b></p>
                        <a class="lot__button lot__text red__button" href="hotel.php?key=<?=$val2['id'];?>">Подробнее</a>
                    </div>
                      <input type="hidden" id="id_user2" value="<?=$username['id'];?>" />

                      <div id = "openModal2<?=$val2['id'];?>" class = "modal" tabindex="-1">
                        <div class = "modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Вы уверены, что хотите удалить выбранный номер ?</h3>
                          <a href="#close" text="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="delete-form__hotel">
                            <form action="delete_hotel.php" method = "post" enctype="multipart/form-data">
                              <input type="hidden" id="delete" name = "delete" value="<?=$val2['id'];?>" />
                              <input type="hidden" id="delete-img" name = "delete-img" value="<?=$val2['title_image'];?>" />
                              <button type = "submit" class="<?=$hidden;?> delete_button red__button">Да</button>
                            </form>
                            <input type="hidden" id="id_user" value="<?=$username['id'];?>" />
                            <div class="form__item--last delete-form__close">
                              <a href="#close" class = "delete__close red__button">Нет</a>
                            </div>
                            </div>

                        </div>
                        </div>
                      </div>
                      </div>

                      <input type="hidden" id="id_user" value="<?=$username['id'];?>" />
                      <div class="one_news">
		                    <button class = "like" id="like"><b class = "count__like"><?=$val2['count_like'];?></b></button>

		                    <input type="hidden" id="id_hotels" value="<?=$val2['id'];?>" />
	                    </div>

                    </div>
              </li>
              </li>
              <?php endforeach ?>
            </ul>
           <?php if($i > 2){ ?>
            <div class="slider-controls">
              <button class="btn btn-slider js-control-prev" type="button" aria-label="Предыдущий слайд">
                <svg width="22" height="40" viewBox="0 0 22 40"><path fill="grey" d="M19.83-.035l2.089 2.099L4.13 19.947l17.847 17.939-2.09 2.099L-.048 19.947z"/></svg>
              </button>
              <button class="btn btn-slider js-control-next" type="button" aria-label="Следующий слайд">
                <svg width="22" height="40" viewBox="0 0 22 40"><path fill="grey" d="M2.098-.035L.009 2.064l17.789 17.883L-.048 37.886l2.089 2.099 19.935-20.038z"/></svg>
              </button>
            </div>
            <div class="togglers">
              <span class="slider-toggler js-toggler-1 slider-toggler-active"></span>
              <span class="slider-toggler js-toggler-2"></span>
              <span class="slider-toggler js-toggler-3"></span>
            </div>
            <script src="src/js/slider.js"></script>
            <? } else if($i == 2){ ?>

              <div class="slider-controls">
              <button class="btn btn-slider js-control-prev2" type="button" aria-label="Предыдущий слайд">
                <svg width="22" height="40" viewBox="0 0 22 40"><path fill="grey" d="M19.83-.035l2.089 2.099L4.13 19.947l17.847 17.939-2.09 2.099L-.048 19.947z"/></svg>
              </button>
              <button class="btn btn-slider js-control-next2" type="button" aria-label="Следующий слайд">
                <svg width="22" height="40" viewBox="0 0 22 40"><path fill="grey" d="M2.098-.035L.009 2.064l17.789 17.883L-.048 37.886l2.089 2.099 19.935-20.038z"/></svg>
              </button>
            </div>
            <div class="togglers">
              <span class="slider-toggler js-toggler-1 slider-toggler-active"></span>
              <span class="slider-toggler js-toggler-2"></span>
            </div>
            <? } ?>
            <script src="src/js/slider2.js"></script>
            <h2 class = "lots-title">Все номера гостиниц</h2>
            <ul class = "lots__list">
            <?php
            foreach($table_array as $val): ?>
              <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="<?= $val['title_image'];?>" class = "hotel-image" width="320" height="240" alt="Home1">
                      <?php
                      if($username){
                      $sql = mysqli_query(mysqli_connect("localhost", "root", "", "diplom"),"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND `id` = $val[id]");
                      $result = mysqli_fetch_row($sql);
                      if($result[0] > 0){ ?>
                      <a href = "#openModal2<?=$val2['id'];?>" class = "parent-del" text="Close"><img src = "/src/img/delete_button.svg" class = "delete_hotel"><span class = "dop-del">x</span></a>
                      <? }
                      }?>
                     <!--  <p><?=$val['id'];?></p> -->
                    </div>
                    <div class="lot-info">
                    <p class="lot__title lot__text"><?= $val['title'];?></p>
                      <div class="lot__state">

                        <p class="lot__text lot__category"><?= $val['category'];?></p>
                        <p class="lot__country lot__text"><?= $val['city'];?></p>
                        <p class="lot__cost lot__text">От <?= $val['price'];?><b class="rub">р</b></p>
                        <a class="lot__button lot__text red__button" href="hotel.php?key=<?=$val['id'];?>">Подробнее</a>
                      </div>
                      <input type="hidden" id="id_user2" value="<?=$username['id'];?>" />

                      <div id = "openModal2<?=$val2['id'];?>" class = "modal">
                        <div class = "modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Вы уверены, что хотите удалить выбранный номер ?</h3>
                          <a href="#close" text="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="form__item">
                            <form action="delete_hotel.php" method = "post" enctype="multipart/form-data">
                              <input type="hidden" id="delete" name = "delete" value="<?=$val['id'];?>" />
                              <input type="hidden" id="delete-img" name = "delete-img" value="<?=$val['title_image'];?>" />
                              <button type = "submit" class="<?=$hidden;?> delete_button">Да</button>
                            </form>
                            <input type="hidden" id="id_user" value="<?=$username['id'];?>" />
                            </div>
                            <div class="form__item form__item--last">
                              <a href="#close">Нет</a>
                            </div>
                        </div>
                        </div>
                      </div>
                      </div>

                      <input type="hidden" id="id_user" value="<?=$username['id'];?>" />
                      <div class="one_news">
		                    <button class = "like" id="like"><b class = "count__like"><?=$val['count_like'];?></b></button>
                        <!-- <span class='hidden'>1 Like</span> -->
		                    <input type="hidden" id="id_hotels" value="<?=$val['id'];?>" />
	                    </div>

                    </div>
              </li>
            <?php endforeach ?>
            </ul>
        <?=shablon('pager', [
          'pages' => $pages,
          'pages_count' => $pages_count,
          'id' => $id,
          'cur_page' => $cur_page
        ]);?>
        </section>



