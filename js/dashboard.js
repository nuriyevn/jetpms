function loadDatesInCaption(days_to_show)
{
    console.log("I'm in loadDates function dashboard.js");
    var $header_table = $('#header_table');
    var d = new Date();
    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    var $year_row = $('<tr></tr>').appendTo($header_table);
    var year = d.getFullYear();
    $('<td class="y" colspan="15"></td>').html(year).appendTo($year_row);

    var $month_row = $('<tr></tr>').appendTo($header_table);
    var month = d.getMonth();
    $('<td class="m" colspan="15"></td>').html(monthNames[month]).appendTo($month_row);

    var $days_row = $('<tr></tr>').appendTo($header_table);
    var day = d.getDate();
    $('<td class="roomName"></td>').html("Room #").appendTo($days_row);


    for (i = 0; i < days_to_show ; i++)
    {
        $('<td></td>').html(day + i).appendTo($days_row);
    }
}


function loadRooms(rooms, room_count, days_to_show)
{
    if (rooms.length > room_count)
    {
        console.log('Database inconsistency, please update room name');
    }
    else if (rooms.length < room_count)
    {
        // some rooms are not full empty;
    }

    for (r = 0; r < room_count; r++)
    {
        var room = rooms[r];

        var class_string = 'table-bordered table-hover table-striped text-center';
        var room_id = "room_id_" + r;
        var $room_table = $("<table> </table>").attr('id', room_id).addClass(class_string);

        var $h4_room_name = $('<h4></h4>').text(room.name);
        var $td_room_name = $('<td colspan="15"></td>').append($h4_room_name);
        var $tr_room_name = $('<tr></tr>').append($td_room_name);

        $room_table.append($tr_room_name);

        for (b = 0; b < room.bed_count; b++)
        {
            var $tr_bed_row = $('<tr></tr>');
            var bed_position = (b % 2 === 0) ? 'lower' : 'upper';
            var $td_bed_name = $('<td class="roomName text-center"></td>').text((b + 1) + ' ' + bed_position);

            $tr_bed_row.append($td_bed_name);

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

        $('#header_table').after($room_table);

    }
}

function orderDialog(string) {
    //$('#orderScreen').html(string.message && '' != string.message ? string.message : 'Empty content' );
    $('#orderScreen').dialog('option', 'title', string.title && '' != string.title ? string.title : 'Empty title' );
    $('#orderScreen').dialog('open');
}

function closeOrderDialog()
{
    $('#orderScreen').dialog('close');
}


function invokeOrderDialog(start_day, end_day)
{
    console.log("Clickable td");
    $('#orderScreen').empty();

    var order_table = $('<table class="orderTable" id="order_table"></table>').appendTo('#orderScreen');

    // Row for name and telephone
    var tr = $('<tr></tr>');

    // Name
    var label_name = $("<p></p>").text("Name");
    var input_name = $('<input type="text"/>').attr('name', "guest_name");
    var td1 = $("<td colspan='3'></td>");
    td1.append(label_name);
    td1.append(input_name);
    tr.append(td1);

    // Telephone
    var label_telephone = $("<p></p>").text("Telephone:");
    var input_telephone = $('<input type="text"/>').attr('name', 'guest_telephone');
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

            console.log("datepicker_in");
            console.log(date.getDate());
            console.log(date);
            console.log($('#datepicker_out').datepicker('option', 'minDate'));
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
            console.log("datepicker_out");
            console.log(date.getDate());
            console.log(date);
            console.log($('#datepicker_in').datepicker('option', 'maxDate'));
            //dates.not(this).datepicker("option", option, date);
            $('#datepicker_in').datepicker('option', option, new Date(date.getTime() - (24 * 60 * 60 * 1000)));
            // $('#coutd').text(date.val());
        }
    });
    // ------------ end of datepickers

    var tr3 = $('<tr></tr>');
    $('<tr><td><br></td></tr>').appendTo(order_table);

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

    console.log(start_day +' '+ end_day);
    var startDate = new Date(dateToday.getFullYear(), dateToday.getMonth(), start_day);
    var endDate = new Date(dateToday.getFullYear(), dateToday.getMonth(), end_day);
    $('#datepicker_in').datepicker('setDate',  startDate );
    $('#datepicker_out').datepicker('setDate', endDate );

    $('#datepicker_in').datepicker('option', 'maxDate', new Date(endDate.getTime() - (24 * 60 * 60 * 1000)));
    $('#datepicker_out').datepicker('option', 'minDate', new Date(startDate.getTime() + (24 * 60 * 60 * 1000)));
    orderDialog({title: 'Order details', message : ''});

};

var dragStart = 0;
var dragEnd = 0;
var isDragging = false;
var start_td_parent = 0;

function rangeMouseDown(e) {
    console.log('mousedown');
    if (isRightClick(e)) {
        return false;
    } else {

        start_td_parent = $(this).parent().get(0);
        console.log(start_td_parent);
        var allCells = $(".clickable_td");
        dragStart = allCells.index($(this));
        isDragging = true;
        if (typeof e.preventDefault != 'undefined') { e.preventDefault(); }
        document.documentElement.onselectstart = function () { return false; };
    }
}

function rangeMouseUp(e) {
    console.log('mouseup');
    if (isRightClick(e)) {
        return false;
    } else {
        var allCells = $('.clickable_td');


        var start = allCells.get(dragStart);
        console.log($(start).html());
        var end = allCells.get(dragEnd);
        console.log($(end).html());

        isDragging = false;
        document.documentElement.onselectstart = function () { return true; };
        if (dragStart < dragEnd) {
            invokeOrderDialog($(start).html(), $(end).html());
        }
        allCells.removeClass('selected');
    }
}

function rangeMouseMove(e) {
    console.log('mousemove');
    if (isDragging ) {
        if (start_td_parent == $(this).parent().get(0)) {
            var allCells = $(".clickable_td");
            dragEnd = allCells.index($(this));
            selectRange();
        }
    }
}

function selectRange() {

    $(".clickable_td").removeClass('selected');
    if (dragStart > dragEnd)
        dragEnd = dragStart;
    $(".clickable_td").slice(dragStart, dragEnd + 1).addClass('selected');

}

function isRightClick(e) {
    if (e.which) {
        return (e.which == 3);
    } else if (e.button) {
        return (e.button == 2);
    }
    return false;
}


function loadOrderDialogDependencies()
{
    console.log("loadOrderDIalogDependencies");
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
        }
    });

    $(".clickable_td").mousedown(rangeMouseDown)
      .mouseup(rangeMouseUp)
      .mousemove(rangeMouseMove);


}

jQuery(document).ready(function ($) {

    waitingDialog({});

    var days_to_show = 5;
    var g_username = "";
    var g_hostel_id = -1;
    var room_count = -1;

    $.ajax({
        url: '/dashboard/getUsername.php',
        type: 'GET',
        data: ''
    });
    $.ajax({
        url: '/dashboard/getHostelid.php',
        type: 'GET',
        data: ''
    });

    $( document ).ajaxComplete(function( event, request, settings ) {
        if (settings.url === '/dashboard/getUsername.php')
        {
            if(request.status === 200)
            {
                console.log("getUsername from dashboard.js on ready is status 200");
                g_username = request.responseText;
                $('#username_link').text(request.responseText);
                loadDatesInCaption(days_to_show);
            }
        }
        else if (settings.url === '/dashboard/getHostelid.php')
        {
            if(request.status === 200) {
                g_hostel_id = request.responseText;
                console.log(g_hostel_id);

                $.ajax({
                    type: 'POST',
                    url: '/dashboard/getRoomCount.php',
                    data: 'hostel_id=' + g_hostel_id
                });

            }
        }
        else if (settings.url === '/dashboard/getRoomCount.php')
        {
            if (request.status === 200)
            {
                room_count = request.responseText;

                //waitingDialog({});
                $.ajax({
                    type: 'POST',
                    url: '/dashboard/getRooms.php',
                    data: 'hostel_id=' + g_hostel_id
                });
            }
        }
        else if (settings.url === '/dashboard/getRooms.php')
        {
            if (request.status === 200)
            {
                var rooms  = jQuery.parseJSON(request.responseText);
                loadRooms(rooms, room_count, days_to_show);
                closeWaitingDialog();
                $('table').removeClass('table-hover');
                loadOrderDialogDependencies();

            }
        }

    });



});