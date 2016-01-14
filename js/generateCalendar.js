/**
 * Created by root on 1/8/16.
 */
/**
 * Created by root on 1/7/16.
 */

var ms_per_day = 24*60*60*1000;
var monthsName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function treatAsUTC(date) {
    var result = new Date(date);
    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
    return result;
}

function daysBetween(startDate, endDate) {
    var millisecondsPerDay = 24 * 60 * 60 * 1000;
    return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
}


function generateCalendar(startDate, endDate)
{
    var prev_date = new Date( startDate);
    var end_date = new Date( endDate);

    $('#tr_year').empty();
    $('#tr_month').empty();
    $('#tr_day').empty();

    // If clause writes all detail of the start date
    if (new Date(prev_date).getTime() === new Date(startDate).getTime())
    {
        var start_of_next_month = new Date(prev_date.getUTCFullYear(),prev_date.getUTCMonth() + 1, 0);
        var start_of_next_year = '01/01/' + (prev_date.getUTCFullYear() + 1);

        var till_month_end = daysBetween( prev_date, start_of_next_month) + 1;
        var till_year_end = daysBetween(prev_date,  start_of_next_year );

        $('#tr_year').append($('<td></td>>').attr('colspan', till_year_end + 1).text(prev_date.getUTCFullYear()));
        $('#tr_month').append($('<td></td>').attr('colspan', till_month_end + 1).text(monthsName[prev_date.getUTCMonth()]));
        $('#tr_day').append($('<td></td>').text(prev_date.getUTCDate()));
    }

    while (new Date(prev_date).getTime() < new Date(end_date).getTime())
    {
        var cur_date = new Date(prev_date.getTime() + ms_per_day);
        if (cur_date.getUTCMonth() != prev_date.getUTCMonth())
        {

            var start_of_next_month = new Date(cur_date.getUTCFullYear(), cur_date.getUTCMonth() + 1, 0);
            var till_month_end = daysBetween( cur_date, start_of_next_month) + 1;
            $('<td></td>').attr('colspan', till_month_end + 1 ).text(monthsName[cur_date.getUTCMonth()]).appendTo('#tr_month');
        }
        if (cur_date.getUTCFullYear() != prev_date.getUTCFullYear())
        {

            var start_of_next_year = '01/01/' + (cur_date.getUTCFullYear() + 1);
            var till_year_end = daysBetween( cur_date, start_of_next_year) + 1;
            $('#tr_year').append($('<td></td>').attr('colspan', till_year_end).text(cur_date.getUTCFullYear()));
        }

        var date = cur_date.getUTCDate();
        $('<td></td>').text(date).appendTo("#tr_day");
        prev_date = new Date(cur_date);
    }
}

/*
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

});
*/