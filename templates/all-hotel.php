<ul class="lots__list">
    <?php foreach($hotels as $val): ?>
        <li class="lots__item lot">
        <div class="lot__image">
                      <img src="<?= $val['title_image'];?>" class = "hotel-image" width="320" height="250"  alt="Home1">
                      <?php 
                      if($username){
                      $sql = mysqli_query(mysqli_connect("localhost", "root", "", "diplom"),"SELECT count(*) FROM `hotels` WHERE `user_id` = $username[id] AND `id` = $val[id]");
                      $result = mysqli_fetch_row($sql);
                      if($result[0] > 0){ ?>
                      <a href = "#openModal2<?=$val['id'];?>" class = "parent-del" text="Close"><img src = "/src/img/delete_button.svg" class = "delete_hotel"><span class = "dop-del">x</span></a>
                    
                      <? } 
                      }?>

                    </div>
                    <div class="lot-info">
                      <div class="lot__state">
                        <p class="lot__title lot__text"><?= $val['title'];?></p>
                        <p class = "lot__text lot__category"><?= $val['category'];?></p>
                        <p class="lot__country lot__text"><?= $val['city'];?></p>
                        <p class="lot__cost lot__text">От <?= $val['price'];?><b class="rub">р</b></p>
                        <a class="lot__button lot__text" href="hotel.php?key=<?=$val['id'];?>">Подробнее</a>
                    </div>
                      <input type="hidden" id="id_user2" value="<?=$username['id'];?>" /> 
                     
                      <div id = "openModal2<?=$val['id'];?>" class = "modal" tabindex="-1">
                        <div class = "modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Вы уверены, что хотите удалить выбранный номер ?</h3>
                          <a href="#close" text="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="delete-form__hotel">
                            <form action="delete_hotel.php" method = "post" enctype="multipart/form-data">
                              <input type="hidden" id="delete" name = "delete" value="<?=$val['id'];?>" />
                              <input type="hidden" id="delete-img" name = "delete-img" value="<?=$val['title_image'];?>" />
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
		                    <button class = "like" id="like"><b class = "count__like"><?=$val['count_like'];?></b></button>
                        <!-- <span class='hidden'>1 Like</span> -->
		                    <input type="hidden" id="id_hotels" value="<?=$val['id'];?>" />
	                    </div>
              
                    </div>
              </li>
    <?php endforeach; ?>
</ul>