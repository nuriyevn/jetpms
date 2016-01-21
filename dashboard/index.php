<?php
    session_start();

    if (!isset($_SESSION['g_username']))
    {

        header("Location: /login/index.php");
       // header("Location: http://google.com");
       // http_response_code(401);
        exit();
    }
    require_once '../app-config.php';
    include_once(ABSPATH."/dashboard/initDashboard.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jet PMS | Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <!-- Fav Icon here -->
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

    <!-- Bootstrap customizable -->
    <link href="/css/dashboard.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/bootstrap/jquery.min.js"></script>
    <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script-->

<!-- Added by Nusrat -->
    <!--script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->
    <!--script-- type="text/javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script-->
    <script src="/js/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="/js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/loading.js"></script>

    <!-- include smoothness jQueryUI theme -->
    <!--link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"-->
    <link rel="stylesheet" href="/js/jquery-ui-1.11.4.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/loading.css">
<!-- Added by Nusrat -->


</head>
<body >
<script>
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("GET", "/dashboard/getUsername.php", false);
    xmlhttp.send();

    if (xmlhttp.status === 401)
    {
       //console.log(xmlhttp.responseText);
        window.location = window.location.origin + "/login/index.php";
    }

</script>
<!--nav bar-->
<?php
include(ABSPATH."/dashboard/navbar.php");
?>
<!-- nav bar end here -->

<div class="row1">
    <div class="col-md-2">
        <div class="row">
            <p id="date">Start calendar: <input type="text" id="datepicker_start"></p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="row">
            <div id="contentSlider"></div>
            <div id="slider"></div>
        </div>
    </div>
    <span class="opts">Room Types:
        <select name="roomTypes" id="">
            <option>De Luxe</option>
            <option>Private</option>
            <option>Female Dorm</option>
            <option>Mixed Dorm</option>
        </select>
    </span>
    <span class="opts">Dealers:
        <select name="roomTypes" id="">
            <option>All</option>
            <option>Booking</option>
            <option>Hostel Wold</option>
            <option>Web Site</option>
        </select>
    </span>
</div>

<div class="mainTable table-responsive">
    <div id="loadingScreen"></div>
    <!--table class="table table-bordered text-center"-->
    <table id="calendar_table" class="table-bordered table-hover table-striped text-center">
        <tr id="tr_year"></tr>
        <tr id="tr_month"></tr>
        <tr id="tr_day">

        </tr>
    </table>


</div>


<div id="orderScreen"></div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap/bootstrap.min.js"></script>
<script src="/js/queryString.js"></script>
<script src="/js/redirectPost.js"></script>
<script src="/js/orderDialog.js"></script>
<script src="/js/selectDatesByDrag.js"></script>
<script src="/js/include.js"></script>
<script src="/js/generateCalendar.js"></script>
<script src="/js/dashboard.js"></script>
<script src="/js/navbar.js"></script>
<script src="/js/dashboardSlider.js"></script>
</body>
</html>
