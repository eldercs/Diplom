
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
                      <img src="<?= $val['img'];?>" width="350" height="260" alt="Home1">
                      <p><?=$val['id'];?></p>
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
                        <span class = "like-counter"><?= $val['like']; ?></span>
                        <input type = "button" class="like" name = "like"></input>
                      </form>
                    </div>
              </li>
            <?php endforeach ?>
            </ul>
        <?=shablon('pager', [
        'pages' => $pages,
        'pages_count' => $pages_count,
        'cur_page' => $cur_page
          ]); ?>
        </section>

