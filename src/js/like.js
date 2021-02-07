/* $("#sendLike").on("click", function(){
    //alert("hello");
}); */
$(document).ready(function() {
    $('span#like').click(function(){
        setVote('like', $(this));
    });
     
     
});
 
// type - тип голоса. Лайк или дизлайк
// element - кнопка, по которой кликнули
function setVote(type, element){
    // получение данных из полей
    var id_user = $('#id_user').val();
    var id_hotel = element.parent().find('#id_hotel').val();
     
    $.ajax({
        // метод отправки 
        type: "POST",
        // путь до скрипта-обработчика
        url: "/index.php",
        // какие данные будут переданы
        data: {
            'id_user': id_user, 
            'id_hotel': id_hotel,
            'type': type
        },
        // тип передачи данных
        dataType: "json",
        // действие, при ответе с сервера
        success: function(data){
            // в случае, когда пришло success. Отработало без ошибок
            if(data.result == 'success'){   
                // Выводим сообщение
                alert('Голос засчитан');
                // увеличим визуальный счетчик
                var count = parseInt(element.find('b').html());
                element.find('b').html(count+1);
            }else{
                // вывод сообщения об ошибке
                alert(data.msg);
            }
        }
    });
}