

$(document).ready(function(){

    $( "#slider" ).slider({
        animate: "slow",
        value : 15,//Значение, которое будет выставлено слайдеру при загрузке
        min : 3,//Минимально возможное значение на ползунке
        max : 46,//Максимально возможное значение на ползунке
        step : 4,//Шаг, с которым будет двигаться ползунок
        create: function( event, ui ) {
            val = $( "#slider" ).slider("value");//При создании слайдера, получаем его значение в перемен. val
            $( "#contentSlider" ).html("Range Calendar: " + val ).css("margin-left", "25px");//Заполняем этим значением элемент с id contentSlider
        },
        slide: function( event, ui ) {
            $( "#contentSlider").html("Range Calendar: " +  ui.value).css("margin-left", "25px");//При изменении значения ползунка заполняем элемент с id contentSlider


        }
    });
    $(function() {
        $( "#datepicker" ).datepicker(

        );

    });
    $.datepicker.formatDate( "dd-mm-yy");
});