
<div class = "notice">
    <h3 class="modal-title">Уведомления</h3>
            <?php
                foreach($notice as $not){ ?>
                <form action="notice.php" class = "notice-block" method = "post" enctype="multipart/form-data">
                    <div class = "notice-block__manin">
                        <h3><?= $not['surname']; ?> <?= $not['name'];?> <?=$not['patronymic'];?> оставил заявку на бронирование:<?=$not['title'];?></h3>
                        <h3>Связаться можно по телефону:<?=$not['telephone'];?></h3>
                        <input type="" id="delete" name = "delete" value="<?=$not['id'];?>" />
                        <div class = "modal" id = "deletenotice<?=$not['id'];?>" >
                        <div class = "modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title">Вы уверены, что хотите удалить выбранную бронь ?</h3>
                          <a href="#close" text="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="delete-form__hotel">
                              <input type="hidden" id="delete" name = "delete" value="<?=$not['id'];?>" />
                              <button type = "submit" class = "delete_button red__button">Да</button>
                            <div class="form__item--last delete-form__close">
                              <a href="#close" class = "delete__close red__button">Нет</a>
                            </div>
                            </div>
              
                        </div>
                        </div>
                      </div>
                        </div>
                    </div>
                    <a href = "#deletenotice<?=$not['id'];?>" class = "red__button delete__notice">Удалить</a>  
                    </form>

                <?}
            ?>
</div>
 

