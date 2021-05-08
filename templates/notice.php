
<div class = "notice">
    <h3 class="modal-title">Уведомления</h3>
            <?php
                foreach($notice as $not){ ?>
                <form action="notice.php" class = "notice-block" method = "post" enctype="multipart/form-data">
                    <div class = "notice-block__manin">
                        <h3><?= $not['surname']; ?> <?= $not['name'];?> <?=$not['patronymic'];?> оставил заявку на бронирование:<?=$not['title'];?></h3>
                        <h3>Связаться можно по телефону:<?=$not['telephone'];?></h3>
                        <input type="hidden" id="delete" name = "delete" value="<?=$not['id'];?>" />
                    </div>
                    <a href = "#deletenotice<?=$not['id'];?>" class = "red__button delete__notice">Удалить</a>  
                    <div id = "deletenotice<?=$not['id'];?>" class = "modal">
                        <div class = "modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Вы уверены, что хотите удалить ?</h3>
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
                </form>

                <?}
            ?>
</div>
 

