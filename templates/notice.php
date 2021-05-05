<div class = "notice">
    <h3 class="modal-title">Уведомления</h3>
            <?php
                foreach($notice as $not){ ?>
                <form action="notice.php" class = "notice-block" method = "post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit?');">
                    <div class = "notice-block__manin">
                        <h3><?= $not['surname']; ?> <?= $not['name'];?> <?=$not['patronymic'];?> оставил заявку на бронирование:<?=$not['title'];?></h3>
                        <h3>Связаться можно по телефону:<?=$not['telephone'];?></h3>
                        <input type="" id="delete" name = "delete" value="<?=$not['id'];?>" />
                    </div>
                    <button type = "submit" class = "red__button delete__notice">Удалить</button>
                </form>
                <?}
            ?>
</div>