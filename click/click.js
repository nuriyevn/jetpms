function orderDialog(string) {
    //$('#orderScreen').html(string.message && '' != string.message ? string.message : 'Empty content' );
    $('#orderScreen').dialog('option', 'title', string.title && '' != string.title ? string.title : 'Empty title' );
    $('#orderScreen').dialog('open');
}

function closeOrderDialog()
{
    $('#orderScreen').dialog('close');
}


$(document).ready(function(){

    var body = $("body");

    var table = body.append($("<table id='table_id'></table>"));

    for (var i = 0; i < 3; i++)
    {
        var tr = $("<tr></tr>").appendTo($('#table_id'));
        tr.attr('id', "tr" + i);
        for (var j = 0; j < 4; j++) {
            var td = $("<td></td>").html(j + 24);
            td.attr('id', 'td' + j);
            tr.append(td);
        }
    }


    $("#orderScreen").dialog({
        autoOpen: false,
        dialogClass: "orderScreenWindow",
        closeOnEscape: true,
        draggable: false,
        width: 500,
        minHeight: 600,
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

    $("td").click(function(){
        $('#orderScreen').empty();

        var $parent =$(this).parent();
        var row = $parent.attr('id');
        var column = $(this).attr('id');

        row = row.substring(2);
        column = column.substring(2);
        console.log(row + ' ' + column);

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
            minDate: tommorow,
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
        orderDialog({title: 'Order details', message : ''});

    });


});