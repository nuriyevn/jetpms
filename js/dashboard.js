// Prototype of the calendar 0.0.0.0.1 Version
// Need to be extended to calendar.
// is called in response to getUsername.php server request
function loadDatesInCaption(days_to_show)
{
    // Calendar table
    $('#calendar_table').empty();
    var $calendar_table = $('#calendar_table');
    var d = new Date();

    var $year_row = $('<tr></tr>').appendTo($calendar_table);
    var year = d.getFullYear();
    $('<td class="y" colspan="' + days_to_show + 1 + '"></td>').html(year).appendTo($year_row);

    var $month_row = $('<tr></tr>').appendTo($calendar_table);

    var monthName = $.datepicker.formatDate('MM', new Date(d));

    $('<td class="m" colspan="' + days_to_show + 1 + '"></td>').html(monthName).appendTo($month_row);

    var $days_row = $('<tr></tr>').appendTo($calendar_table);
    var day = d.getDate();
    $('<td class="roomName"></td>').html("Room #").appendTo($days_row);

    for (var i = 0; i < days_to_show ; i++)
    {
        $('<td></td>').html(day + i).appendTo($days_row);
    }
    // End of calendar header table
}

// Should be loaded during initial page loading
// Currently loaded from onReady->initLoad->loadRooms
// getRooms.php - gets rooms {name, bed_count, id}
// getRoomCount.php - gets room_count from hostel table

function loadRooms(rooms, room_count, days_to_show)
{
    // room_count - all room count
    // rooms.length - configured room count

    if (rooms.length > room_count)
    {
        console.log('Database inconsistency');
    }
    else if (rooms.length < room_count)
    {
        // some rooms are not full empty;
    }

    $("[id^=room_id_]").remove();

    for (var r = 0; r < room_count; r++)
    {
        var room = rooms[r];

        var class_string = 'table-bordered table-hover table-striped text-center';
        var room_id = "room_id_" + room.id;
        var $room_table = $("<table> </table>").attr('id', room_id).addClass(class_string);

        var $h4_room_name = $('<h4></h4>').text(room.name + ' #' + room.id);
        var $td_room_name = $('<td colspan="' + days_to_show + 1 + '"></td>').append($h4_room_name);
        var $tr_room_name = $('<tr></tr>').append($td_room_name);

        $room_table.append($tr_room_name);

        for (b = 0; b < room.bed_count; b++)
        {
            var $tr_bed_row = $('<tr></tr>');
            var bed_position = (b % 2 === 0) ? 'lower' : 'upper';
            var $td_bed_name = $('<td class="roomName text-center"></td>').text((b + 1) + ' ' + bed_position);

            $tr_bed_row.append($td_bed_name);

            // cur_date = today - 1
            // cur_date = day from start calendar
            for (d = 0; d < days_to_show; d++)
            {
                var date = new Date();
                var day = date.getDate();

                /*if (d === -1)
                    $('<td ></td>').html(day + d).appendTo($tr_bed_row);
                else*/
                    $('<td class="clickable_td"></td>').html(day + d).appendTo($tr_bed_row);
            }

            $room_table.append($tr_bed_row);
        }
        $('#calendar_table').after($room_table);
    }
}

// Draws rectangular selection for given single order
//

function drawOrder(order)
{
    var date_in  = order.date_in;
    var date_out = order.date_out;
    var room_id = order.room_id;
    var bed_index = order.bed_index;

    var day_in = new Date(date_in);
    day_in = day_in.getDate();
    var day_out = new Date(date_out);
    day_out = day_out.getDate();

    var $room_table = $('#room_id_' + room_id);
    var room_row = $room_table.children().eq(0).children().eq(bed_index);

    var len = room_row.children().length;
    for (var i = 0; i < len; i++)
    {
        var t = Number(room_row.children().eq(i).text());
        if (t >= day_in && t < day_out)
        {
            room_row.children().eq(i).addClass('booked');
        }
    }
}

function drawAllOrders()
{
    //$('.clickable_td').removeClass('booked');
    console.log('drawAllOrders');

    $.ajax({
        url: '/dashboard/getRooms.php',
        type: 'POST',
        data: '',
        complete: function(e, xhr, settings)
        {
            if (e.status === 200)
            {
                //
                console.log('getRooms from draw');
                var rooms = jQuery.parseJSON(e.responseText);
                for (var r = 0; r < rooms.length; r++)
                {
                    $.ajax({
                        url:'/dashboard/getAllOrders.php',
                        type: 'POST',
                        data: 'room_id=' + encodeURIComponent(rooms[r].id),
                        complete: function(e, xhr, settings) {
                            if (e.status === 200)
                            {
                                var orders = jQuery.parseJSON(e.responseText);
                                for (var i = 0; i < orders.length; i++)
                                {
                                    drawOrder(orders[i]);
                                }
                            }
                        }
                    });
                }
            }
        }
    });

}



function invokeOrderDialog(start_day, end_day, interval, room_id, bed_index)
{
    $('#orderScreen').empty();

    var order_table = $('<table class="orderTable" id="order_table"></table>').appendTo('#orderScreen');

    // Row for name and telephone
    var tr = $('<tr></tr>');

    // Name
    var label_name = $("<p></p>").text("Name Surname");
    var input_name = $('<input id="guest_name_id" type="text" value="Nusrat Nuriyev"/>').attr('name', "guest_name");
    var td1 = $("<td colspan='3'></td>");
    td1.append(label_name);
    td1.append(input_name);
    tr.append(td1);

    // Telephone
    var label_telephone = $("<p></p>").text("Telephone:");
    var input_telephone = $('<input type="text" value="+380976496329"/>').attr('name', 'guest_telephone');
    var td2 = $('<td colspan="3"></td>');
    td2.append(label_telephone);
    td2.append(input_telephone);
    tr.append(td2);

    tr.appendTo(order_table);
    // END of name and telephone

    // Row for checking in and checking out datepickers
    var tr2 = $('<tr></tr>');
    // Checking in
    var label_in = $("<p></p>").text("Check in date:");
    var input_in = $('<input type="text" id="datepicker_in"/>');
    td1 = $("<td colspan='3'></td>");
    td1.append(label_in);
    td1.append(input_in);
    tr2.append(td1);

    // Checking out
    var label_out = $('<p></p>').text('Check out date:');
    var input_out = $('<input type="text" id="datepicker_out"/>');
    td2 = $('<td colspan="3"></td>');
    td2.append(label_out);
    td2.append(input_out);
    tr2.append(td2);

    tr2.appendTo(order_table);
    $("<p id='cind'></p>").appendTo($('#orderScreen'));
    $("<p id='coutd'></p>").appendTo($('#orderScreen'));

    var dateToday = new Date();
    var tommorow = new Date() + 1;
    var dates;

    $("#datepicker_in").datepicker({
        defaultDate: "0",
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: dateToday,

        onSelect: function(selectedDate) {
            var option = "minDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            $('#datepicker_out').datepicker('option', option, new Date(date.getTime() + (24*60*60*1000)));
        }

    });

    $("#datepicker_out").datepicker({
        defaultDate: '+1',
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        numberOfMonths : 1,
       // minDate: tommorow,
        onSelect: function(selectedDate) {
            var option = "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            $('#datepicker_in').datepicker('option', option, new Date(date.getTime() - (24 * 60 * 60 * 1000)));
        }
    });
    // ------------ end of datepickers

    var tr3 = $('<tr></tr>');
    var td3;
    $('<tr><td id="order_status_id"><br></td></tr>').appendTo(order_table);

    var book_button = $('<input type="button" id="book_button"/>').attr('value', 'Book').addClass('btn-primary');
    var checkin_button = $('<input type="button" id="checkin_button"/>').attr('value', 'Check in').addClass('btn-primary');
    var checkout_button = $('<input type="button" id="checkout_button"/>').attr('value', 'Check out').addClass('btn-primary');

    td1 = $('<td colspan="2"></td>').append(book_button).appendTo(order_table);
    td2 = $('<td colspan="2"></td>').append(checkin_button).appendTo(order_table);
    td3 = $('<td colspan="2"></td>').append(checkout_button).appendTo(order_table);
    tr3.append(td1);
    tr3.append(td2);
    tr3.append(td3);
    tr3.appendTo(order_table);

    var startDate = new Date(dateToday.getFullYear(), dateToday.getMonth(), start_day);
    var endDate = new Date(dateToday.getFullYear(), dateToday.getMonth(), end_day);

    $('#datepicker_in').datepicker('setDate',  startDate );
    $('#datepicker_out').datepicker('setDate', new Date(endDate.getTime() + 24 * 60 * 60 * 1000) );

    $('#datepicker_in').datepicker('option', 'maxDate', new Date(endDate.getTime()/* - (24 * 60 * 60 * 1000)*/));
    $('#datepicker_out').datepicker('option', 'minDate', new Date(startDate.getTime() + (24 * 60 * 60 * 1000)));

    var _date_in = $('#datepicker_in').datepicker('getDate');
    var _date_out = $('#datepicker_out').datepicker('getDate');
    var date_in = $.datepicker.formatDate('yy-mm-dd', new Date(_date_in));  // user clicked
    var date_out = $.datepicker.formatDate('yy-mm-dd', new Date(_date_out)); //

    $.ajax({
        url: '/dashboard/checkAvailability.php',
        type: 'POST',
        data: 'room_id=' + encodeURIComponent(room_id)
            + '&bed_index=' + encodeURIComponent(bed_index)
            + '&date_in=' + encodeURIComponent(date_in)
            + '&date_out=' + encodeURIComponent(date_out),
        complete: function(e, xhr, settings){
            if (e.status === 200)
            {

                var infos = jQuery.parseJSON(e.responseText);
                var info = infos[0];
                console.log(info);
                console.log(info.avail);

                if (info.avail == 1)
                {
                    $('#book_button').click({room_id: room_id, bed_index: bed_index}, book_button_click);
                    orderDialog({title: 'Order details', message : ''});

                }
                else if (info.avail == 0)
                {
                    $('#datepicker_in').datepicker('option', 'maxDate', new Date(info.date_in));
                    $('#datepicker_out').datepicker('option', 'minDate', new Date(info.date_out));

                    $('#datepicker_in').datepicker('setDate', new Date(info.date_in)).attr('disabled', true);
                    $('#datepicker_out').datepicker('setDate', new Date(info.date_out)).attr('disabled', true);
                    $('input[name="guest_name"]').val(info.first_name + ' ' + info.last_name).attr('disabled', true);
                    $('input[name="guest_telephone"]').val(info.telephone).attr("disabled", true);
                    $('#book_button').attr('disabled', true).css('background-color', 'grey');
                    orderDialog({title: 'Order details', message: ''});
                    drawAllOrders();
                    console.log('Already booked');
                }
            }
        }
    });
};

// orderScreen::book_button click procedure
function book_button_click(event)
{
    var name_surname = $('input[name="guest_name"]').val();
    var telephone = $('input[name="guest_telephone"]').val();
    var arr = name_surname.split(' ');
    var first_name = arr[0];
    var last_name = arr[1];
    var _date_in = $('#datepicker_in').datepicker('getDate');
    var _date_out = $('#datepicker_out').datepicker('getDate');
    var date_in = $.datepicker.formatDate('yy-mm-dd', new Date(_date_in));
    var date_out = $.datepicker.formatDate('yy-mm-dd', new Date(_date_out));

    console.log('IN before/after:' + _date_in +' ' + date_in);
    console.log('OUT before/after:' + _date_out +' ' + date_out);


    var room_id = event.data.room_id;
    var bed_index = event.data.bed_index;

    console.log("room_id = " + room_id + '; bed_index = ' + bed_index);

    $.ajax({
        url: '/dashboard/createOrder.php',
        type: 'POST',
        data: 'first_name=' + encodeURIComponent(first_name)
        + '&last_name=' + encodeURIComponent(last_name)
        + '&telephone=' + encodeURIComponent(telephone)
        + '&date_in=' + encodeURIComponent(date_in)
        + '&date_out=' + encodeURIComponent(date_out)
        + '&room_id=' + encodeURIComponent(room_id)
        + '&bed_index=' + encodeURIComponent(bed_index),
        complete: function(e, xhr, settings) {
            if (e.status === 200) {
                console.log("closeOrderDialog");
                closeOrderDialog();
            }
            else
            {
                $('#order_status_id').text("Error: status code " + e.status);
            }
        }
    });
}

function loadOrderDialogDependencies()
{
    $("#orderScreen").dialog({
        autoOpen: false,
        dialogClass: "orderScreenWindow",
        closeOnEscape: true,
        draggable: false,
        width: 500,
        minHeight: 60,
        modal: true,
        buttons: {},
        resizable: false,
        open: function() {
            $('body').css('overflow', 'hidden'  );
        },
        close: function(){
            $('body').css('overflow', 'auto');
            removeRange();
            drawAllOrders();

        }
    });

    $(".clickable_td").mousedown(rangeMouseDown)
      .mouseup(rangeMouseUp)
      .mousemove(rangeMouseMove);
}

var days_to_show = 15;
jQuery(document).ready(function ($) {
    if (typeof QueryString.slider_position == "string") {
        days_to_show = QueryString.slider_position;
        console.log('Before. days_to_show = ' + days_to_show);
    }
    loadRangeSlider();
    initLoad();
});

function initLoad() {
    waitingDialog({});

    var g_username = "";
    var g_hostel_id = -1;
    var room_count = -1;

    $.ajax({
        url: '/dashboard/getUsername.php',
        type: 'GET',
        data: ''
    });
    $.ajax({
        url: '/dashboard/getHostelName.php',
        type: 'GET',
        data: ''
    });

    $(document).ajaxComplete(function (event, request, settings) {
        if (settings.url === '/dashboard/getUsername.php') {
            if (request.status === 200) {
                g_username = request.responseText;
                $('#username_link').text(request.responseText);
                loadDatesInCaption(days_to_show);
            }
        }
        else if (settings.url === '/dashboard/getHostelName.php') {
            if (request.status === 200) {
                var hostel_info = jQuery.parseJSON(request.responseText);
                $('#hostel_name_id').text(hostel_info[0].name + ' #' + hostel_info[0].id);

                g_hostel_id = hostel_info[0].id;

                $.ajax({
                    type: 'POST',
                    url: '/dashboard/getRoomCount.php',
                    data: 'hostel_id=' + g_hostel_id
                });

            }
        }
        else if (settings.url === '/dashboard/getRoomCount.php') {
            if (request.status === 200) {
                room_count = request.responseText;

                $.ajax({
                    type: 'POST',
                    url: '/dashboard/getRooms.php',
                    data: 'hostel_id=' + g_hostel_id,
                    complete: function (request, xhr, settings) {
                        console.log('Get rooms from ready');
                        if (request.status === 200) {

                            var rooms = jQuery.parseJSON(request.responseText);
                            loadRooms(rooms, room_count, days_to_show);
                            closeWaitingDialog();
                            $('table').removeClass('table-hover');
                            loadOrderDialogDependencies();
                            drawAllOrders();
                        }
                    }
                });
            }
        }

    });
}