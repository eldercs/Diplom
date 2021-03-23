<style>
.one_news span {
    border: 1px dotted;
    cursor: pointer;
    display: block;
    margin-bottom: 5px;
    text-align: center;
    width: 85px;
}
.one_news span:hover{
	border: 1px solid;
}
</style>
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
            <label for="search" class = "label__price">Цена</label>
            <input type="search" class = "scan-price" id = "price_search" name="price_search" placeholder="от:" autocomplete="off">
            <input type="search" class = "scan-price" id = "price_search2" name="price_search2" placeholder="до:" autocomplete="off">
           <!--  <label for="scan-input" class = "scan-icon"></label> -->
            <input class="scan-btn" type="submit" name="find" value="Найти">
        </form>
        <hr class="hr-shelf">
        <section class = "main-like">
            <h2>Дома которые нравятся гостям</h2>
            <ul class = "lots__list">
            <?php
            foreach($table_array as $val): ?>
              <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="<?= $val['image'];?>" width="350" height="260" alt="Home1">
                     <!--  <p><?=$val['id'];?></p> -->
                    </div>
                    <div class="lot__info">
                      <div class="lot__state">
                      <h3 class="lot__title"><a class="text-link" href="hotel.php?key=<?=$val['id']; ?>"><?= $val['title'];?></a></h3>
                      <span class="lot__country"><?= $val['city'];?></span>
                        <div class="lot__rate">
                          <span class="lot__cost">От <?= $val['price'];?><b class="rub">р</b></span>
                        </div>
                      </div>
                      <input type="hidden" id="id_user" value="<?=$username['id'];?>" /> 
                      <div class="one_news">
		                    <button class = "like" id="like"><b class = "count__like"><?=$val['count_like'];?></b></button>
                        <!-- <span class='hidden'>1 Like</span> -->
		                    <input type="hidden" id="id_hotels" value="<?=$val['id'];?>" />
	                    </div>
                     <!--  <script>
                      $(function(){
                      $('.like-toggle').click(function(){
                      $(this).toggleClass('like-active');
                      $(this).next().toggleClass('hidden');
                      });
                      });
                      </script> -->
                        <!-- <script src="src/js/like.js"></script> -->
                       <!--  <span class = "like-counter"></span>
                        <input type = "button" class="like" name = "like"></input> -->
                  <!--     </form> -->
                    </div>
              </li>
            <?php endforeach ?>
            </ul>
        <?=shablon('pager', [
          'pages' => $pages,
          'pages_count' => $pages_count,
          'cur_page' => $cur_page
        ]);?>
        </section>


