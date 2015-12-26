<!DOCTYPE html>
<html>
<head>
    <title>
        click
    </title>
    <link rel="stylesheet" type="text/css" href="/click/click.css"/>
    <link rel="stylesheet" href="/click/jquery-ui-1.11.4.custom/jquery-ui.css">
    <link rel="stylesheet" href="/click/jquery-ui-1.11.4.custom/jquery-ui.structure.css">
    <link rel="stylesheet" href="/click/jquery-ui-1.11.4.custom/jquery-ui.theme.css">
</head>
<body>

<h1>test table</h1>
<table  id="test_table">
    <tr>
        <td><div id="test">#room</div></td>
        <td id="id1"> <?php echo date("d") - 1; ?></td>
        <td><?php echo date("d"); ?></td>
        <td><?php echo date("d") + 1; ?></td>
        <td><?php echo date("d") + 2; ?></td>
    </tr>
    <tr>
        <td>1 lower</td>
        <td><?php echo date("d") - 1; ?></td>
        <td><?php echo date("d"); ?></td>
        <td><?php echo date("d") + 1; ?></td>
        <td><?php echo date("d") + 2; ?></td>
    </tr>
    <tr>
        <td>2 upper</td>
        <td><?php echo date("d") - 1; ?></td>
        <td><?php echo date("d"); ?></td>
        <td><?php echo date("d") + 1; ?></td>
        <td><?php echo date("d") + 2; ?></td>
    </tr>
    <tr>
        <td>3 lower</td>
        <td><?php echo date("d") - 1; ?></td>
        <td><?php echo date("d"); ?></td>
        <td><?php echo date("d") + 1; ?></td>
        <td><?php echo date("d") + 2; ?></td>
    </tr>
    <tr>
        <td>4 lower</td>
        <td><b><?php echo date("d") - 1; ?></b><i>  and other stuff</i></td>
        <td><?php echo date("d"); ?></td>
        <td><?php echo date("d") + 1; ?></td>
        <td><?php echo date("d") + 2; ?></td>
    </tr>
</table>

<input id="elem" type="button" value="Нажми меня" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- jQuery easing plugin -->
<script src="/click/jquery-ui-1.11.4.custom/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="/click/click.js"></script>

<div id="loadingScreen"></div>
</body>
</html>
