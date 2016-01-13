/**
 * Created by Elisha on 11.01.2016.
 */
$(".spoiler-trigger").click(function() {
    $(this).parent().next().collapse('toggle');
});