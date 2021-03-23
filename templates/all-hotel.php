<ul class="lots__list">
    <?php foreach($hotels as $val): ?>
        <li class="lots__item lot">
                    <div class="lot__image">
                      <img src="<?= $val['image'];?>" width="350" height="260" alt="Home1">
                    </div>
                    <div class="lot__info">
                      <div class="lot__state">
                      <h3 class="lot__title"><a class="text-link" href="hotel.php?key=<?=$val['id']; ?>"><?= $val['title'];?></a></h3>
                      <span class="lot__country"><?= $val['city'];?></span>
                        <div class="lot__rate">
                          <span class="lot__cost">От <?= $val['price'];?><b class="rub">р</b></span>
                        </div>
                      </div>
                      <form action="#" method = "post" enctype="multipart/form-data">
                        <input type="hidden" name = "id_hotel" value ="<?= $val["id"];?>">
                        <span class = "like-counter"><?= $val['count_like']; ?></span>
                        <input type = "button" class="like" name = "like"></input>
                      </form>
                    </div>
              </li>
    <?php endforeach; ?>
</ul>