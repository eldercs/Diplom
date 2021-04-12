<form action="update.php" method = "post" enctype="multipart/form-data">
<div>
    <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
    <!-- <h2 for="name">id: <?= $table_array['id'] ?></h2> -->
        <h2 for="name">Название</h2>
        <input id="name" class = "item-name" type="text" name="title" placeholder="Введите название заведения" required value="<?=$table_array['title'];?>">
    </div>
        <div class="lot__image">
            
            <img src="<?=$table_array['title_image'];?>" id="output" width="600"   alt="Home1"/>
        </div>
        <input type='file' id="imgInp" name="img" onchange="loadFile(event, 1)"/>
        <!-- <div class="form__item form__item--file form__item--last">
            <input  type="file" name="img" id="input__file" class="input input__file">
            <label for="input__file" class="input__file-button">
                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
                <span class="input__file-button-text">Выберите файл</span>
            </label>
            <script src = "src/js/file_load.js">  </script>
            <span class="form__error2"><?=isset($errors['img'])? $errors['img'] : "";?></span>
        </div>   --> 
        <div class="albom-image">
           <h2> Вы можете загрузить картинки для галереи отеля </h2>
            <br>
            <input type='file' id="imgInp" name="image2" onchange="loadFile(event, 2)"/>
            <img  src="#" id="output2" alt="your image" width="250" />
            <input type='file' id="imgInp" name="image3" onchange="loadFile(event, 3)"/>
            <img id="output3" src="#" alt="your image"  width="250" />
            <br>
            
            <input type='file' id="imgInp" name="image4" onchange="loadFile(event, 4)"/>
            <img id="output4" src="#" alt="your image" width="250"/>
            <input type='file' id="imgInp" name="image5" onchange="loadFile(event, 5)"/>
            <img id="output5" src="#" alt="your image" width="250"/>
        </div>
    </div>
    <div>
        <h2>Описание</h2>
        <div>
        <div class = "form__item">
          <label for ="price">Цена</label>
          <input id ="price" class ="add-price" type="number" name="price" placeholder="0" required value="<?=$table_array['price'];?>">
        </div>
        <div class="form__item form__item--small">
          <label for="city">Город</label>
          <input id="city" class = "item-city" type="text" name="city" placeholder="Введите город" required value="<?=$table_array['city']; ?>">
        </div>
        <div class="form__item form__item--wide">
            <label for="description">Описание</label>
            <textarea id="description" class = "description" name="description" placeholder="Напишите описание номера" required><?=$table_array['description']; ?></textarea>
        </div>
        <!-- <div>
            <span class="hotel__city"><?= htmlspecialchars($table_array['city']);?></span>
            <span class="hotel__cost">От <?= htmlspecialchars($table_array['price']);?><b class="rub">р</b></span>
            <span class="hotel__description"><?= htmlspecialchars($table_array['description']);?></span>
        </div> -->
    </div>
        <p>
        <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />
        </p>
    </div>
    <button type="submit" class="add__button red__button">Сохранить</button>
</form>
<script>
  var loadFile = function(event, id) {
    if(id == 1)
    var output = document.getElementById('output');
    if(id == 2)
    var output = document.getElementById('output2');
    if(id == 3)
    var output = document.getElementById('output3');
    if(id == 4)
    var output = document.getElementById('output4');
    if(id == 5)
    var output = document.getElementById('output5');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<!-- <script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script> -->