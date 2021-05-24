<div class = "jurnal">
<form action="jurnal.php" method="post" enctype="multipart/form-data">
<select id="jurnal-category" name="category" class = "jurnal-category">
    <option data-id = "ajax.php" value = "1" id="1">За этот день</option>
    <option value = "2" id="2">За неделю</option>
    <option value = "3" id="3">За месяц</option>
    <option value = "4" id="4">За все время</option>
</select>
<button type="submit">Отсортировать</button>
</form>
<?php foreach($jurnal as $jur){ ?>
<div class = "jurnal-event">
    <p class = "jurnal__user">Пользователь <?= $jur['creator']; ?> создал номер <?= $jur['hotel_title']; ?></p>
    <p class = "jurnal__date">Дата: <?= $jur['time']; ?></p>
</div>
<?}?>
</div>