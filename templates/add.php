      <form class="form form--add-lot add-container form--invalid" method="post"> <!-- form--invalid -->
            <h2>Добавление номера</h2>
            <div class="form__container-two">
              <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
                <label for="lot-name">Название</label>
                <input id="lot-name" class = "item-name" type="text" name="lot-name" placeholder="Введите название заведения" required>
                <!-- <span class="form__error">Введите наименование лота</span> -->
              </div>
              <div class="form__item">
                <label for="category">Категория</label>
                <select id="category" name="category" required>
                  <option>Отели</option>
                  <option>Апартаменты/квартиры</option>
                  <option>Курортные отели</option>
                  <option>Виллы</option>
                  <option>Шале</option>
                  <option>Котеджи</option>
                </select>
               <!--  <span class="form__error">Выберите категорию</span> -->
              </div>
              <div class = "form__item">
                <label for="lot-rate">Цена</label>
                <input id="lot-rate" class ="add-price" type="number" name="lot-rate" placeholder="0" required>
            </div>
            </div>
            <div class="form__item form__item--small">
                <label for="lot-city">Город</label>
                    <input id="lot-city" class = "item-city" type="text" name="lot-city" placeholder="Введите город" required>
                <!--  <span class="form__error">Введите шаг ставки</span>  -->
            </div>
            <div class="form__item form__item--wide">
              <label for="message">Описание</label>
              <textarea id="message" class = "description" name="message" placeholder="Напишите описание номера" required></textarea>
              <!-- <span class="form__error">Напишите описание номера</span> -->
            </div>
            <div class="form__item form__item--file"> <!-- form__item--uploaded -->
              <div class="form__input-file">
                <div class = "add-img">
                    <label>Изображение</label>
                    <input class="visually-hidden" type="file" id="photo2">
                    <label for="photo2">
                    <span>+ Добавить</span>
                    </label>
                </div>
              </div>
            </div>
            <!-- <div class="form__container-three">
              <div class="form__item form__item--small">
                <label for="lot-rate">Цена</label>
                <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
                <span class="form__error">Введите начальную цену</span> 
              </div> -->
              <!-- <div class="form__item form__item--small">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
                 <span class="form__error">Введите шаг ставки</span> 
              </div> -->
             <!--  <div class="form__item">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date" required>
                <span class="form__error">Введите дату завершения торгов</span> 
              </div> -->
           <!--      -->
            <!-- <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span> -->
            <button type="submit" class="add__button red__button">Добавить лот</button>
          </form>
    