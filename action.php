<?php
if(!empty($_FILES['file']['tmp_name'])){ 
  //Получаем временный файл
  $tmp = $_FILES['file']['tmp_name'];
  
  //Получаем имя присланного файла
  $name = $_FILES['file']['name'];
  
  //Пишем куда в дальнейшем, надо будет впихнуть файл, 
  //в данном случае в папку images, имя файла оставляем родное
  $path = "img/".$name;
  
  //перемещаем файл на сервер
  move_uploaded_file($tmp, $path);
  
  //Собственно выводим изображение
  echo "<img src='$path' alt='$name' />";
}
?>