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


var monthsName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function generateCalendar(startDate, endDate)
{
    var prev_date = new Date( startDate);
    var end_date = new Date( endDate);

    $('#tr_year').empty();
    $('#tr_month').empty();
    $('#tr_day').empty();

    if (new Date(prev_date).getTime() === new Date(startDate).getTime())
    {
        var start_of_next_month = new Date(prev_date.getUTCFullYear(),prev_date.getUTCMonth() + 1, 0);
        var start_of_next_year = '01/01/' + (prev_date.getUTCFullYear() + 1);

        var till_month_end = daysBetween( prev_date, start_of_next_month) + 1;
        var till_year_end = daysBetween(prev_date,  start_of_next_year );

        console.log("tme and tye " + till_month_end + ' ' + till_year_end);
        console.log(" UTC = " + prev_date.getUTCDate() + ' non-UTC = ' + prev_date.getDate());

        $('#tr_year').append($('<td></td>>').attr('colspan', till_year_end + 1).text(prev_date.getUTCFullYear()));


        //$.datepicker.formatDate('MM', prev_date)
        $('#tr_month').append($('<td></td>').attr('colspan', till_month_end + 1).text(monthsName[prev_date.getUTCMonth()]));
        $('#tr_day').append($('<td></td>').text(prev_date.getUTCDate()));
    }

    while (new Date(prev_date).getTime() < new Date(end_date).getTime())
    {
        var cur_date = new Date(prev_date.getTime() + ms_per_day);
        var date_str  = cur_date.getUTCDate();

        if (cur_date.getUTCMonth() != prev_date.getUTCMonth()) {

            var start_of_next_month = new Date(cur_date.getUTCFullYear(), cur_date.getUTCMonth() + 1, 0);
            var till_month_end = daysBetween( cur_date, start_of_next_month) + 1;

            $('<td></td>').attr('colspan', till_month_end + 1 ).text(monthsName[cur_date.getUTCMonth()]).appendTo('#tr_month');

            date_str += " " + $.datepicker.formatDate('MM', new Date(cur_date));
        }
        if (cur_date.getUTCFullYear() != prev_date.getUTCFullYear()) {

            var start_of_next_year = '01/01/' + (cur_date.getUTCFullYear() + 1);
            var till_year_end = daysBetween( cur_date, start_of_next_year) + 1;

            $('#tr_year').append($('<td></td>').attr('colspan', till_year_end).text(cur_date.getUTCFullYear()));
            date_str += " " + cur_date.getUTCFullYear();
        }


        var date = cur_date.getUTCDate();
        console.log("before appending date = " + cur_date);
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

           // console.log("date_in" + new Date(selectedDate).getUTCDate() + ' ' + new Date(selectedDate).getDate());
           // $('#datepicker_in').datepicker('setDate', new Date(Date.UTC(selectedDate)));

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

    var date_out;
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
   // $('#datepicker_in').datepicker('option', 'dateFormat', 'dd/mm/yy');
   // $('#datepicker_out').datepicker('option', 'dateFormat', 'dd/mm/yy');

    // var today = new Date();
 //   $('#datepicker_in').datepicker('setDate', new Date());
   // $('#datepicker_out').datepicker('setDate', new Date(today.getTime() + ms_per_day*65));





});
