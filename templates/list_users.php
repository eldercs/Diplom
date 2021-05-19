<?php foreach($list_users as $us): ?>
<form action="list_users.php"  method = "post" enctype="multipart/form-data">
<div class = "user-info">
    <p class="user__email"><?= $us['email'];?></p>
    <p class = "user__name"><?= $us['name'];?></p>
    <a href = "#deletenotice<?=$us['id']; ?>" class = "red__button delete__notice">Удалить</a>  
</div>
<div class = "modal" id = "deletenotice<?=$us['id'];?>" >
    <div class = "modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Удалить выбранного пользователя?</h3>
                <a href="#close" text="Close" class="close">×</a>
            </div>
            <div class="modal-body">
                <div class="delete-form__hotel">
                    <input type="hidden" id="delete" name = "delete" value="<?=$us['id'];?>" />
                    <button type = "submit" class = "delete_button red__button">Да</button>
                    <div class="form__item--last delete-form__close">
                        <a href="#close" class = "delete__close red__button">Нет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php endforeach ?>