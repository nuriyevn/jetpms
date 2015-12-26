//$( "td" ).on( "click", function() {
//    $( this ).css( "background-color", "red" );
//});




$(document).ready(function() { // ждет загрузку документа
    // create the loading window and set autoOpen to false
    console.log(window.location);

    //console.log("ready"); // когда готов документ - пишет реди
        $("#loadingScreen").dialog({ // вибирает селекторс индетификаторм и вызывает метод дилог()
            // параметры метода, в котрых сам черт ногу сломит , согласен
            autoOpen: false,	// set this to false so we can manually open it
            dialogClass: "loadingScreenWindow",
            closeOnEscape: true,
            draggable: false,
            width: 460,
            minHeight: 50,
            modal: true,
            buttons: {},
            resizable: false,
            open: function() { //нахер тут опен?
                // scrollbar fix for IE
                $('body').css('overflow','hidden'); // наверное при открытии диалога к нему применяются какие то цсс свойства
            },
            close: function() { // а это цсс свойства, когда закрывается диалог
                // reset overflow
                $('body').css('overflow','auto');
            }
        }); // end of dialog

        // клик на ячейку таблицы
        $("td").on("click", function() {
            console.log("Hello, fucking world in console.log" + $(this).html()); // при клике в консоль записывает содержание
            // ячейки все абсолютно что содежиться со всем форматированием и другими тегами
            var $td_html = $(this).html();
           waitingDialog( { title: 'Booking for', message : $td_html } ); // здесь вызывается функция с двумя параметрами, функиция описана ниже
        });


});

function waitingDialog(waiting) { // I choose to allow my loading screen dialog to be customizable, you don't have to
   var $html = (waiting.message && '' != waiting.message) ? waiting.message : 'Please wait...';
   // if((waiting.message) && ('' != waiting.message))
   // {
   //     var $html = "Please wait...";
   //
   // }else
   // {
   //     var $html = waiting.message;
   // }
    // Проверяем

    // не могу понять зачем 44 строка, ведь она у  нас нигде не отабатывает
    // это твой любимый тернарик.
    //  (condition) ? (if true ) : (if false);

    // сейчас соображу
    // если выполняется условие waiting.message && '' != waiting.message
    // тогда ожидающее сообщение и есть само сообщение, а если оно пустое, то надо написать ЖДИТЕ
    // Ляпота, не?
    // это не лучший стиль написания кода, даже я не сразу (с первого взгляда понял)
    // Перепиши эту хрень с помощью if, закрепим
    // галя требуюет от менч лечь спать (
    // давай перепишу
    // не могу понять что в условии
    // а если так:
    // (waiting.message && ('' != waiting.message))
    // то есть должно быть ожидающее сообщение и оно не доложно быть пустым
    // так

    // значит перменной штмл присваивается значение
    var input = "<input type='button' id='close_dialog' value='close' onclick='closeWaitingDialog();'/>";
    var $html = $html + "<br>" + input;

   // $("#close_dialog").on('click', function)

    $("#loadingScreen").html($html);
    $("#loadingScreen").dialog('option', 'title', waiting.title && '' != waiting.title ? waiting.title : 'Loading');
    $("#loadingScreen").dialog('open');
}
function closeWaitingDialog() {
    $("#loadingScreen").dialog('close');
}