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

</head>
<body>

<!--nav bar-->
<?php
include("navbar.php");
?>
<!-- nav bar end here -->

<div class="row1">
    <input type="button" class="btn-default" value="- 30">
    <input type="button" class="btn-default" value="- 7">
    <input type="button" class="btn-default" value="Today">
    <input type="button" class="btn-default" value="+ 7">
    <input type="button" class="btn-default" value="+ 30">
    <span class="opts">Date: <input type="date"></span>
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
    <?php
    $d = date("d");
    ?>
    <table class="table table-bordered text-center">

        <table class="table-bordered table-hover table-striped text-center">
            <tr>
                <td class="y" colspan="15"><?php echo date("Y"); ?></td>
            </tr>
            <tr>
                <td class="m" colspan="15"><?php echo date("M") ?></td>
            </tr>
            <tr>
                <td class="roomName">Room #</td>
                <td><?php echo $d - 1; ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>

            </tr>
        </table>

        <!--        for each room created internal table -->

        <!--        FIRST room goes here -->
        <table class="table-bordered table-hover table-striped text-center">
            <tr>
                <td colspan="15"><h4>Double Private Room</h4></td>
            </tr>
            <tr>
                <td class="roomName text-center">1 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">2 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
        </table>
        <!--        end of FIRST room  -->

        <!--        SECOND room goes here -->
        <table class="table-bordered table-hover table-striped text-center">
            <tr>
                <td colspan="15"><h4>Mixed dorm for four</h4></td>
            </tr>
            <tr>
                <td class="roomName text-center">1 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">2 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">3 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">4 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
        </table>
        <!--        end of SECOND room  -->

        <!--        THIRD room goes here -->
        <table class="table-bordered table-hover table-striped text-center">
            <tr>
                <td colspan="15"><h4>Female dorm for six</h4></td>
            </tr>
            <tr>
                <td class="roomName text-center">1 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">2 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">3 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">4 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">5 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">6 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
        </table>
        <!--        end of THIRD room  -->

        <!--        FOURTH room goes here -->
        <table class="table-bordered table-hover table-striped text-center">
            <tr>
                <td colspan="15"><h4>Mixed dorm for eight</h4></td>
            </tr>
            <tr>
                <td class="roomName text-center">1 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">2 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">3 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">4 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">5 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">6 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">7 lower</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
            <tr>
                <td class="roomName text-center">8 upper</td>
                <td><?php echo($d - 1); ?></td>
                <td><?php echo($d); ?></td>
                <td><?php echo($d + 1); ?></td>
                <td><?php echo($d + 2); ?></td>
                <td><?php echo($d + 3); ?></td>
                <td><?php echo($d + 4); ?></td>
                <td><?php echo($d + 5); ?></td>
                <td><?php echo($d + 6); ?></td>
                <td><?php echo($d + 7); ?></td>
                <td><?php echo($d + 8); ?></td>
                <td><?php echo($d + 9); ?></td>
                <td><?php echo($d + 10); ?></td>
                <td><?php echo($d + 11); ?></td>
                <td><?php echo($d + 12); ?></td>
            </tr>
        </table>
        <!--        end of FOURTH room  -->
        <!--        nd of all rooms-->
    </table>


</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/bootstrap/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap/bootstrap.min.js"></script>
</body>
