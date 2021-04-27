<form action="update.php" method = "post" enctype="multipart/form-data">
<div class = "main-editor">
    <div class="editor__item form__item--invalid"> <!-- form__item--invalid -->
    <!-- <h2 for="name">id: <?= $table_array['id'] ?></h2> -->
        <h2 for="name">Название</h2>
        <input id="name" class = "editor-text item-name" type="text" name="title" placeholder="Введите название заведения" required value="<?=$table_array['title'];?>">
        <div class="editor__image">
            <img src="<?=$table_array['title_image'];?>" id="output" width="600" alt="Home1"/>
        </div>
        <input type="file" id="input__file" class="input input__file"  onchange="loadFile(event, 1)">
            <label for="input__file" class="input__file-button">
                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./src/img/add.png" alt="Выбрать файл" width="40"></span>
                <span class="input__file-button-text">Выберите файл</span>
            </label>
        <script src = "src/js/file_load.js"></script>
        <h2>Описание</h2>
        <div class = "editor_description">
        <div class = "editor__item">
        <div class = "editor-label">
          <label for ="price">Цена</label>
        </div>
          <input id ="price" class ="editor-text add-price" type="number" name="price" placeholder="0" required value="<?=$table_array['price'];?>">
        </div>
        <div class="editor__item form__item--small">
        <div class = "editor-label">
          <label for="city">Город</label>
        </div>
          <input id="city" class = "editor-text item-city" type="text" name="city" placeholder="Введите город" required value="<?=$table_array['city']; ?>">
        </div>
        <div class="editor__item editor__description">
            <label for="description" class = "editor-label">Описание</label>
            <textarea id="description" class = "description" name="description" placeholder="Напишите описание номера" required><?=$table_array['description']; ?></textarea>
        </div>
        </div>
        <p>
            <input type="hidden" name="page_id" value="<?=htmlspecialchars($table_array['id']); ?>" />
        </p>
    </div>
    
        <h2> Вы можете загрузить картинки для галереи отеля </h2>
        <div class="albom-image">
            <label for="imgInp2">
                <input type='file' id="imgInp2" class = "imgInp" name="image2" onchange="loadFile(event, 2)"/>
                <?php if($hotel_image['image2']): ?>
                    <div class = "add_editor">
                        <img src="<?=$hotel_image['image2'];?>" class = "image_editor" id="output2" alt="your image" height = "140" />
                        <img id="output3" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php else: ?>
                    <div class = "add_editor">
                        <img src="/src/img/not-image.png" id="output2" alt="your image" width="140" />
                        <img id="output3" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php endif; ?>
            </label>
            <label for="imgInp3">
                <input type='file' id="imgInp3" class = "imgInp" name="image3" onchange="loadFile(event, 3)"/>
                <?php if($hotel_image['image3']): ?>
                    <div class = "add_editor">
                        <img src="<?=$hotel_image['image3'];?>" id="output3" class = "image_editor" alt="your image" height = "140" />
                        <img id="output3" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php else: ?>
                    <div class = "add_editor">
                        <img src="/src/img/not-image.png" id="output2" alt="your image" width="140" />
                        <img id="output3" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php endif; ?>
            </label>
            <br>
            <label for="imgInp4">
                <input type='file' id="imgInp4" class = "imgInp" name="image4" onchange="loadFile(event, 4)"/>
                <?php if($hotel_image['image4']): ?>
                    <div class = "add_editor">
                        <img src="<?=$hotel_image['image4'];?>" id="output4" alt="your image" height = "140" />
                        <img id="output4" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php else: ?>
                    <div class = "add_editor">
                        <img src="/src/img/not-image.png" id="output2" alt="your image" width="140" />
                        <img id="output3" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php endif; ?>
            </label>
            <label for="imgInp5">
                <input type='file' id="imgInp5" class = "imgInp" name="image5" onchange="loadFile(event, 5)"/>
                <?php if($hotel_image['image5']): ?>
                    <div class = "add_editor">
                        <img src="<?=$hotel_image['image5'];?>" id="output5" alt="your image" height = "140" />
                        <img id="output5" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php else: ?>
                    <div class = "add_editor">
                        <img src="/src/img/not-image.png" id="output2" alt="your image" width="140" />
                        <img id="output3" src="/src/img/add-editor.png" class = "image_editor2" alt="your image"  width="50" />
                    </div>
                <?php endif; ?>
            </label>
        </div>
    </div>

    <div class = "button_editor">
        <button type="submit" class="editor__button red__button">Сохранить</button>
    </div>
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