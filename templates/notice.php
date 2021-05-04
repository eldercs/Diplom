<div class = "notice">
    <h3 class="modal-title">Уведомления</h3>
            <?php
                foreach($notice as $not){ ?>
                <div class = "notice-block">
                    <div class = "notice-block__manin">
                        <h3><?= $not['surname']; ?> <?= $not['name'];?> <?=$not['patronymic'];?> оставил заявку на бронирование:<?=$not['title'];?></h3>
                        <h3>Связаться можно по телефону:<?=$not['telephone'];?></h3>
                    </div>
                    <a href="#modal_delete" class = "delete__notice"><img src ="/src/img/delete_button.svg" class = "delete__notice-img"></a>
                </div>
                <?}
            ?>
</div>