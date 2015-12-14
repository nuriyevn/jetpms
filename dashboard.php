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

<nav role="navigation" class="navbar navbar-default">

    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#">Inbox</a></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="#">Accounting</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
        <h4 class="navbar-text"> [ HOSTEL'S NAME (#9999) ] </h4>
        <input type="text" class="navbar-text text-center" placeholder="FIND">
        <ul class="nav navbar-nav navbar-right">
           <li> <a href="#toUserProfile">User Name</a></li>
           <li><a href="#">Log out</a></li>
        </ul>
    </div>
</nav>
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
<div class="month text-center">
    <?php echo date("M");?>
</div>
<div class="days text-center">
    <div class="col-md-1 day numbers">Room numbers</div>
    <div class="col-md-1 day"><?php echo (date("d"))-1;?></div>
    <div class="col-md-1 day today"><?php echo (date("d"));?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+1;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+2;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+3;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+4;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+5;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+6;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+7;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+8;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+9;?></div>

</div>
<div class="roomtype1 text-center">
    De Luxe
</div>
<div class="days text-center">
    <div class="col-md-1 day numbers">De Lux1</div>
    <div class="col-md-1 day"><?php echo (date("d"))-1;?></div>
    <div class="col-md-1 day today"><?php echo (date("d"));?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+1;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+2;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+3;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+4;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+5;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+6;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+7;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+8;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+9;?></div>

</div>
<div class="days text-center">
    <div class="col-md-1 day numbers">De Lux2</div>
    <div class="col-md-1 day"><?php echo (date("d"))-1;?></div>
    <div class="col-md-1 day today"><?php echo (date("d"));?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+1;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+2;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+3;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+4;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+5;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+6;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+7;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+8;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+9;?></div>

</div>
<div class="roomtype1 text-center">
    Room for four Mixed Dorm
</div>
<div class="days text-center">
    <div class="col-md-1 day numbers">De Lux1</div>
    <div class="col-md-1 day"><?php echo (date("d"))-1;?></div>
    <div class="col-md-1 day today"><?php echo (date("d"));?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+1;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+2;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+3;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+4;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+5;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+6;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+7;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+8;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+9;?></div>

</div>
<div class="days text-center">
    <div class="col-md-1 day numbers">De Lux2</div>
    <div class="col-md-1 day"><?php echo (date("d"))-1;?></div>
    <div class="col-md-1 day today"><?php echo (date("d"));?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+1;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+2;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+3;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+4;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+5;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+6;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+7;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+8;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+9;?></div>

</div>
<div class="days text-center">
    <div class="col-md-1 day numbers">De Lux1</div>
    <div class="col-md-1 day"><?php echo (date("d"))-1;?></div>
    <div class="col-md-1 day today"><?php echo (date("d"));?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+1;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+2;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+3;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+4;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+5;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+6;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+7;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+8;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+9;?></div>

</div>
<div class="days text-center">
    <div class="col-md-1 day numbers">De Lux2</div>
    <div class="col-md-1 day"><?php echo (date("d"))-1;?></div>
    <div class="col-md-1 day today"><?php echo (date("d"));?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+1;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+2;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+3;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+4;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+5;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+6;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+7;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+8;?></div>
    <div class="col-md-1 day"><?php echo (date("d"))+9;?></div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap/bootstrap.min.js"></script>
<script src="/js/index.js"></script>
</body>
