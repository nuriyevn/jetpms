<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jet PMS | Accounting</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap customizable -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/accounting.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--nav bar-->
<?php include("navbar.php"); ?>
<!-- nav bar end here -->

<div class="container">

    <div class="row">
            From: <input type="date" class="sel">
            To: <input type="date" class="sel">
            <button class="btn-success sel"><i class="fa fa-refresh"></i> Transfer money</button>
            <button class="btn-success sel"><i class="fa fa-wrench"></i> Report Settings</button>
    </div>

    <div class="mainTable">

        <table class="table table-bordered table-hover table-striped text-center">
            <h3 class="text-center">General report</h3>
            <thead>
            <th>Accounts  <i class="fa fa-cogs"></i></th>
            <th>Start balance </th>
            <th>Income payment</th>
            <th>Expences</th>
            <th>Final balance</th>
            </thead>
            <tr>
                <th>Cashier</th>
                <td>1 800</td>
                <td>600 <i class="small text-muted"><a href="#">(+200)</a></i></td>
                <td>100 <i class="small text-muted"><a href="#">(-1 200)</a></i></td>
                <td>1 300</td>
            </tr>
            <tr>
                <th>Credit Card</th>
                <td>550</td>
                <td>300</td>
                <td>200 <i class="small text-muted"><a href="#">(-200)</a></i></td>
                <td>450</td>
            </tr>
            <tr>
                <th>Incasated</th>
                <td>15 250</td>
                <td>0 <i class="small text-muted"><a href="#">(-1 200)</a></i></td>
                <td>3 125</td>
                <td>13 325</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>17 600</td>
                <td>900 <i class="small text-muted"><a href="#">(+1 400)</a></i></td>
                <td>3 425 <i class="small text-muted"><a href="#">(-1 400)</a></i></td>
                <td>15 075</td>
            </tr>
        </table>

        <!--        Income report -->
        <table class="table table-bordered table-hover table-striped text-center">
            <h3 class="text-center">The Earnings Report</h3>
            <h5 class="text-center">
                <i class=" fa fa-plus-circle sel"> Add payment</i>
                <i class="fa fa-minus-circle sel"> Delete payment </i>
                <i class="fa fa-pencil-square-o sel"> Edit</i>
            </h5>

            <div class="text-center">
                <span class="sel"> Cashier: <input type="checkbox"> </span>
                <span class="sel"> Cedit Card: <input type="checkbox"> </span>
                <span class="sel"> Incasated: <input type="checkbox"> </span>
            </div>
            <thead>
                <td id="select">Select</td>
                <td>Order#</td>
                <td>Date && Time</td>
                <td>Guest Name</td>
                <td>To account</td>
                <td>Amount</td>
            </thead>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>546</td>
                <td>jun 2, 9:45</td>
                <td>Ivan Ivanov</td>
                <td>Cashier</td>
                <td>200</td>
            </tr>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>416</td>
                <td>jun 2, 11:03</td>
                <td>Olga Petrova</td>
                <td>Cashier</td>
                <td>400</td>
            </tr>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>236</td>
                <td>jun 2, 13:48</td>
                <td>Julia Bibik</td>
                <td>Card</td>
                <td>150</td>
            </tr>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>532</td>
                <td>jun 2, 22:08</td>
                <td>Oxana Hug</td>
                <td>Card</td>
                <td>150</td>
            </tr>
        </table>
        <!--       END of Income report -->

        <!--        Expenses report -->
        <table class="table table-bordered table-hover table-striped text-center">
            <h3 class="text-center">The expense report</h3>
            <h5 class="text-center">
                <i class=" fa fa-plus-circle sel"> Add expense</i>
                <i class="fa fa-minus-circle sel"> Delete expense </i>
                <i class="fa fa-pencil-square-o sel"> Edit</i>
            </h5>

            <div class="text-center">
                <span class="sel"> Cashier: <input type="checkbox"> </span>
                <span class="sel"> Cedit Card: <input type="checkbox"> </span>
                <span class="sel"> Incasated: <input type="checkbox"> </span>
            </div>
            <thead>
                <td id="select">Select</td>
                <td>Date && Time</td>
                <td>From account</td>
                <td>Category</td>
                <td>Subcategory</td>
                <td>Amount</td>
            </thead>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>jun 2, 10:15</td>
                <td>Incasated</td>
                <td>House keeping</td>
                <td>Liquid soap</td>
                <td>100</td>
            </tr>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>jun 2, 12:15</td>
                <td>Incasated</td>
                <td>Services</td>
                <td>Electricity</td>
                <td>2 950</td>
            </tr>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>jun 2, 15:05</td>
                <td>Cashier</td>
                <td>Refund</td>
                <td>Ylia Bibik</td>
                <td>200</td>
            </tr>
            <tr>
                <td><input type="checkbox" class="checkbox"></td>
                <td>jun 2, 18:55</td>
                <td>Credit Card</td>
                <td>Bookers</td>
                <td>Hstel World</td>
                <td>200</td>
            </tr>
        </table>
        <!--      END of  Expenses report -->

    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap/bootstrap.min.js"></script>

</body>
