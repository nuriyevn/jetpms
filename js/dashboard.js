function loadDates(days_to_show)
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


    for (i = -1; i < days_to_show - 1; i++)
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
        var $room_table = $("<table></table>").attr('id', room_id).addClass(class_string);

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

            for (d = -1; d < days_to_show - 1; d++)
            {
                var date = new Date();
                var day = date.getDate();
                $('<td></td>').html(day + d).appendTo($tr_bed_row);
            }

            $room_table.append($tr_bed_row);
        }

        $('#header_table').after($room_table);

    }
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
                loadDates(days_to_show);
            }
        }
        else if (settings.url === '/dashboard/getHostelid.php')
        {
            if(request.status === 200) {
                g_hostel_id = request.responseText;

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
            }
        }

    });
});