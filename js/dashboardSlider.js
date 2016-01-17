

//$(document).ready(function(){
function loadRangeSlider(){
    $( "#slider" ).slider({
        animate: "slow",
        value : (days_to_show != 0) ? days_to_show : 15,//Значение, которое будет выставлено слайдеру при загрузке
        min : 3,//Минимально возможное значение на ползунке
        max : 46,//Максимально возможное значение на ползунке
        step : 4,//Шаг, с которым будет двигаться ползунок
        create: function( event, ui ) {
            val = $( "#slider" ).slider("value");//При создании слайдера, получаем его значение в перемен. val
            $( "#contentSlider" ).html("Range Calendar: " + val ).css("margin-left", "25px");//Заполняем этим значением элемент с id contentSlider
        },
        slide: function(event, ui) {
            $("#contentSlider").html("Range Calendar: " + ui.value).css("margin-left", "25px");//При изменении значения ползунка заполняем элемент с id contentSlider
        },
        stop: function( event, ui ) {
            days_to_show = ui.value;

            /*console.log('ui.value = ' + ui.value);
            var redirect = window.location.origin + '/dashboard/index.php';
            var start_date = $('datepicker_start').datepicker('getDate');
            $.redirectPost(redirect, {slider_position: ui.value, start_date: start_date});
            */

            initLoad();


        }
    });

    $(function() {
        var defaultDate = new Date();
        defaultDate.setTime(defaultDate.getTime() - ms_per_day);
        if (calendar_from == 0)
            calendar_from = defaultDate;

        $( "#datepicker_start" ).datepicker({
            defaultDate: "-1",
            dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            onSelect: function(selectedDate)
            {
                var instance = $(this).data("datepicker");
                calendar_from = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);

               /* if (calendar_from.getUTCDate() != calendar_from.getDate())
                {

                    console.log("calendFrom before = " + calendar_from);
                    calendar_from.setUTCFullYear(calendar_from.getFullYear());
                    calendar_from.setUTCMonth(calendar_from.getMonth());
                    calendar_from.setUTCDate(calendar_from.getDate());

                    console.log("calendFrom after = " + calendar_from);

                    //$(this).datepicker('setDate', calendar_from)
                }*/

                console.log("ds calendar_from = " + calendar_from + 'selectedDate='+selectedDate + "; date = " + calendar_from.getUTCDate());
              //  loadDatesInCaption(calendar_from, days_to_show);
             //   var redirect = window.location.origin + '/dashboard/index.php';
              //  $.redirectPost(redirect, {slider_position: QueryString.slider_position, start_date: encodeURIComponent(calendar_from)});
                initLoad();
            }
        });


        $('#datepicker_start').datepicker('setDate', defaultDate );

    });
    $.datepicker.formatDate( "dd-mm-yy");
};