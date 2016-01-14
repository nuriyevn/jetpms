/**
 * Created by root on 1/5/16.
 */

// Create/Show order dialog with message and title
function orderDialog(string) {
    //$('#orderScreen').html(string.message && '' != string.message ? string.message : 'Empty content' );
    $('#orderScreen').dialog('option', 'title', string.title && '' != string.title ? string.title : 'Empty title' );
    $('#orderScreen').dialog('open');
}


// Close/Hide created dialog
function closeOrderDialog()
{
    $('#orderScreen').dialog('close');
}