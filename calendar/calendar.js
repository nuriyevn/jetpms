

$(document).ready(function(){

    var calendar = $('#calendar_id');

    $('<input type="text" id="datepicker_in" />').appendTo($('body'));
    $('<input type="text" id="datepicker_out"/>').appendTo($('body'));

    $('#datepicker_in').datepicker({
        defaultDate: "0",
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        onSelect: function(selectedDate) {
            if (selectedDate != '' && $('#datepicker_out').datepicker('getDate'))
            {
                console.log("Generate called");
                var end =  new Date ($('#datepicker_out').datepicker('getDate'));
                var start = new Date ($('#datepicker_in').datepicker('getDate'));
                generateCalendar(Date.UTC(start.getFullYear(), start.getMonth(), start.getDate()),
                                 Date.UTC(end.getFullYear(), end.getMonth(), end.getDate()));
            }
        }
    });

    $('#datepicker_out').datepicker({
        defaultDate: "0",
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        onSelect:function(selectedDate) {
            if (selectedDate != '' && $('#datepicker_in').datepicker('getDate'))
            {
                var start = new Date($('#datepicker_in').datepicker('getDate'));
                var end = new Date($('#datepicker_out').datepicker('getDate'));
                generateCalendar(Date.UTC(start.getFullYear(), start.getMonth(), start.getDate()),
                    Date.UTC(end.getFullYear(), end.getMonth(), end.getDate()));
            }
        }
    });



    $('#test_table').on('click', "td", function(){

        var col_span = $(this).attr('colspan');
        if (typeof (col_span) == 'undefined')
        {
            console.log("col_span is undefined = " + undefined);
        }
        else (typeof (col_span) == 'integer')
        {
            console.log("col_span  is integer = " + col_span);
        }
        /*
        alert($(this).cellPos().top +","+ $(this).cellPos().left
            + "; " + $(this).attr('colspan'));*/

    });

});
