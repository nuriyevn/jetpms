function display_t()
{
	var d = new Date();
	document.getElementById('ct').innerHTML = d;
}
function display_ct()
{
	var interval = 1000;
	setInterval(display_t, interval);
}
