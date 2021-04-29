<form class="form form--add-lot add-container form--invalid"  action="bron.php" method="post" enctype="multipart/form-data">
    <h2>Заполните дополнительные поля для бронирования</h2>
    <label for ="bron__name">Ваше имя</label>
    <input id="bron__name" class = "bron__name" type="text" name="bron__name" placeholder="Введите название заведения" required value="<?= isset($_POST['bron__name'])? $_POST['bron__name'] : ''; ?>">
    <br>
    <label for ="bron__number">Ваш номер</label>
    <input id ="price" class ="bron__number" type="number" name="bron__number" placeholder="0" required value="<?= isset($_POST['bron__number'])? $_POST['bron__number'] : ''; ?>">
    <br>
    <button type="submit" class="bron__button">Отправить</button>
</form>