var dragStart = 0;
var dragEnd = 0;


var isDragging = false;
var start_td_parent = 0;

function rangeMouseDown(e) {
    if (isRightClick(e)) {
        return false;
    } else {
        start_td_parent = $(this).parent().get(0);
        var allCells = $(".clickable_td");
        dragStart = allCells.index($(this));
        dragEnd = dragStart;
        selectRange();
        isDragging = true;
        if (typeof e.preventDefault != 'undefined') { e.preventDefault(); }
        document.documentElement.onselectstart = function () { return false; };

        // Test
        /*var id_string = $(this).attr('id');
        var res  = id_string.split('/');
        var month = res[0];
        var year = res[1];

        console.log("my id = " + id_string + ' month = ' + monthsName[month] + "; year = "
            + year);*/

    }
}

function rangeMouseUp(e) {
    if (isRightClick(e)) {
        return false;
    } else {
        var allCells = $('.clickable_td');

        var start = $(allCells.get(dragStart)).html();
        var end = $(allCells.get(dragEnd)).html();

        var start_id_string =  $(allCells.get(dragStart)).attr('id');
        var end_id_string = $(allCells.get(dragEnd)).attr('id');


        var res_start = start_id_string.split('/');
        var res_end = end_id_string.split('/');

        var start_day = Date.UTC(res_start[1], res_start[0], start);
        var end_day = Date.UTC(res_end[1], res_end[0], end);

        var interval = end - start + 1;

        isDragging = false;
        document.documentElement.onselectstart = function () { return true; };
        if (dragStart <= dragEnd)
        {
            var room_row = $(this).parent().parent();
            var room_h4_tag = $(room_row).children(':first').children(':first').children(':first');
            var room_id = room_h4_tag.html().split('#')[1];

            var bed_index_tag = $(this).parent().children(':first');
            var bed_index = bed_index_tag.html().split(' ')[0];

            //invokeOrderDialog(start, end, interval, room_id, bed_index);
            console.log("MouseUp: start_day = " + start_day
                        + "end_day = " + end_day);

            invokeOrderDialog(start_day, end_day, interval, room_id, bed_index);
        }
    }
}

function rangeMouseMove(e) {
    if (isDragging )
    {
        if (start_td_parent == $(this).parent().get(0)) {
            var allCells = $(".clickable_td");
            dragEnd = allCells.index($(this));
            selectRange();
        }
    }
}

function removeRange()
{
    if (dragStart > dragEnd)
        dragEnd = dragStart;
    $(".clickable_td").slice(dragStart, dragEnd + 1).removeClass('selected');
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

/**
 * Created by root on 1/3/16.
 */
