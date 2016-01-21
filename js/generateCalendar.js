/**
 * Created by root on 1/8/16.
 */
/**
 * Created by root on 1/7/16.
 */


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

    $('<td class="roomName"></td>').html("Room #").appendTo($('#tr_day'));
    $('<td class="roomName"></td>').html("Month #").appendTo($('#tr_month'));
    $('<td class="roomName"></td>').html("Year #").appendTo($('#tr_year'));


    // If clause writes all detail of the start date
    if (new Date(prev_date).getTime() === new Date(startDate).getTime())
    {
        var start_of_next_month = new Date(prev_date.getUTCFullYear(),prev_date.getUTCMonth() + 1, 0);
        var start_of_next_year = '01/01/' + (prev_date.getUTCFullYear() + 1);

        var till_month_end = daysBetween( prev_date, start_of_next_month) + 1;
        var till_year_end = daysBetween(prev_date,  start_of_next_year );

        $('#tr_year').append($('<td></td>>').attr('colspan', till_year_end + 1).text(prev_date.getUTCFullYear()));
        $('#tr_month').append($('<td></td>').attr('colspan', till_month_end + 1).text(monthsName[prev_date.getUTCMonth()] + " #" + prev_date.getUTCMonth()));
        var date_padded = prev_date.getUTCDate()
        if (date_padded < 10)
            date_padded = "0" + date_padded;

        $('#tr_day').append($('<td></td>').text(date_padded));
    }

    while (new Date(prev_date).getTime() < new Date(end_date).getTime())
    {
        var cur_date = new Date(prev_date.getTime() + ms_per_day);
        if (cur_date.getUTCMonth() != prev_date.getUTCMonth())
        {

            var start_of_next_month = new Date(cur_date.getUTCFullYear(), cur_date.getUTCMonth() + 1, 0);
            var till_month_end = daysBetween( cur_date, start_of_next_month) + 1;
            $('<td></td>').attr('colspan', till_month_end + 1 ).text(monthsName[cur_date.getUTCMonth()] + " #" + cur_date.getUTCMonth()).appendTo('#tr_month');
        }
        if (cur_date.getUTCFullYear() != prev_date.getUTCFullYear())
        {

            var start_of_next_year = '01/01/' + (cur_date.getUTCFullYear() + 1);
            var till_year_end = daysBetween( cur_date, start_of_next_year) + 1;
            $('#tr_year').append($('<td></td>').attr('colspan', till_year_end).text(cur_date.getUTCFullYear()));
        }

        var date = cur_date.getUTCDate();
        var date_padded = date;
        if (date_padded < 10)
            date_padded = "0" + date_padded;

        $('<td></td>').text(date_padded).appendTo("#tr_day");
        prev_date = new Date(cur_date);
    }

}
