/**
 * Created by root on 1/7/16.
 */

var ms_per_day = 24*60*60*1000;

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

    if (new Date(prev_date).getTime() === new Date(startDate).getTime())
    {
        var start_of_next_month = new Date(prev_date);
        start_of_next_month.setMonth(prev_date.getMonth() + 1);
        start_of_next_month.setDate(0);

        var start_of_next_year = '01/01/' + (prev_date.getFullYear() + 1);
        var till_month_end = daysBetween( prev_date, start_of_next_month) + 1;
        var till_year_end = daysBetween(prev_date,  start_of_next_year );

        $('#tr_year').append($('<td></td>>').attr('colspan', till_year_end).text(prev_date.getFullYear()));
        $('#tr_month').append($('<td></td>').attr('colspan', till_month_end).text($.datepicker.formatDate('MM', new Date(prev_date))));
        $('#tr_day').append($('<td></td>').text(prev_date.getDate()));
    }

    while (new Date(prev_date).getTime() < new Date(end_date).getTime())
    {
        var cur_date = new Date(prev_date.getTime() + ms_per_day);
        var date_str  = cur_date.getDate();

        if (cur_date.getMonth() != prev_date.getMonth()) {


            var start_of_next_month = new Date(cur_date);
            start_of_next_month.setMonth(cur_date.getMonth() + 1);
            start_of_next_month.setDate(start_of_next_month.getDate() - 1);

            var till_month_end = daysBetween( cur_date, start_of_next_month);

            $('<td></td>').attr('colspan', till_month_end + 1 ).text($.datepicker.formatDate('MM', new Date(cur_date))).appendTo('#tr_month');

            date_str += " " + $.datepicker.formatDate('MM', new Date(cur_date));
        }
        if (cur_date.getFullYear() != prev_date.getFullYear()) {

            var start_of_next_year = '01/01/' + (cur_date.getFullYear() + 1);
            var till_year_end = daysBetween( cur_date, start_of_next_year);

            $('#tr_year').append($('<td></td>').attr('colspan', till_year_end).text(cur_date.getFullYear()));
            date_str += " " + cur_date.getFullYear();
        }

        var date = cur_date.getDate();
        $('<td></td>').text(date).appendTo("#tr_day");

        prev_date = new Date(cur_date);
    }
}

$(document).ready(function(){

    var calendar = $('#calendar_id');

    $('<input type="text" id="datepicker_in" />').appendTo($('body'));
    $('<input type="text" id="datepicker_out"/>').appendTo($('body'));

    var date_in;
    $('#datepicker_in').datepicker({
        defaultDate: "0",
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        onSelect: function(selectedDate) {

            //date_in = $('#datepicker_in').datepicker('getDate');
            if (selectedDate != '' && $('#datepicker_out').datepicker('getDate'))
            {
                var end =  ($('#datepicker_out').datepicker('getDate'));
                var start =  ($('#datepicker_in').datepicker('getDate'));
                generateCalendar(new Date(start), new Date(end));
            }
        }
    });


    var date_out;
    $('#datepicker_out').datepicker({
        defaultDate: "0",
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        onSelect:function(selectedDate) {
            //date_out = $('#datepicker_out').datepicker('getDate');
            if (selectedDate != '' && $('#datepicker_in').datepicker('getDate'))
            {
                var start = new Date($('#datepicker_in').datepicker('getDate'));
                var end = new Date($('#datepicker_out').datepicker('getDate'));
                generateCalendar(new Date(start), new Date(end));
            }
        }
    });
   // $('#datepicker_in').datepicker('option', 'dateFormat', 'dd/mm/yy');
   // $('#datepicker_out').datepicker('option', 'dateFormat', 'dd/mm/yy');


    // var today = new Date();
 //   $('#datepicker_in').datepicker('setDate', new Date());
   // $('#datepicker_out').datepicker('setDate', new Date(today.getTime() + ms_per_day*65));





});
