<!DOCTYPE html>
<html>
<head>

    <title>JetPMS | Settings</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JetPMS [Set up step first]</title>

    <!-- Bootstrap -->

    <link href="/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap/bootstrap-theme.css" rel="stylesheet">

    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/set-test.css">
</head>
<body>



<!-- multistep form -->

<div class="col-md-6 col-md-offset-3">
    <h1 class="text-center">Basic settings for hostel</h1>
    <form id="msform">

        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Adding rooms</li>
            <li>Configuring rooms</li>
            <li>Configuring prices</li>
        </ul>

        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">About Hostel</h2>

            <h3 class="fs-subtitle">This is step 1</h3>
            <input type="text" name="name" placeholder="Hostel's name"/>
            <input type="number" min="1" max="24" placeholder="How many rooms in hostel?">

            <input type="button" name="next" class="next action-button" value="Next"/>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Configuring the rooms</h2>

            <h3 class="fs-subtitle">Name the room, define type and capacity</h3>

            <input hidden name="roomscount" value="">


            Room #1
            <input type="text" name="room-name" placeholder="Give a name for this room"/>
            <select name="" id="">
                <option value="0">Lux</option>
                <option value="1">Private</option>
                <option value="2">Female dorm</option>
                <option value="3">Mixed dorm</option>
            </select>
            <hr>
            Room #2
            <input type="text" name="room-name" placeholder="Give a name for this room"/>
            <select name="" id="">
                <option value="0">Lux</option>
                <option value="1">Private</option>
                <option value="2">Female dorm</option>
                <option value="3">Mixed dorm</option>
            </select>

            <input type="button" name="previous" class="previous action-button" value="Previous"/>
            <input type="button" name="next" class="next action-button" value="Next"/>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Configuring the prices</h2>
            <h3 class="fs-subtitle">Define it for each room</h3>

            <div class="row">
                <div class="span12">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#room1" data-toggle="tab">Room #1</a></li>
                        <li><a href="#room2" data-toggle="tab">Room #2</a></li>
                        <li><a href="#room3" data-toggle="tab">Room #3</a></li>
                        <li><a href="#room4" data-toggle="tab">Room #4</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="room1">
                            <h3>Check the data below:</h3>
                            Room's name is: @room1 <br>
                            Room's type is: @type1 <br>
                            Room's capacity is: @capacity1 <br>
                            Please define price per bed in this room <br>
                            <input type="number" min="1" name="roomprice1" placeholder="Price in local currency">
                        </div><!-- @end #room1 -->

                        <div class="tab-pane" id="room2">
                            <h3>Check the data below:</h3>
                            Room's name is: @room2 <br>
                            Room's type is: @type2 <br>
                            Room's capacity is: @capacity2 <br>
                            Please define price per bed in this room <br>
                            <input type="number" min="1" name="roomprice2" placeholder="Price in local currency">
                        </div><!-- @end #room2 -->

                        <div class="tab-pane" id="room3">
                            <h3>Check the data below:</h3>
                            Room's name is: @room3 <br>
                            Room's type is: @type3 <br>
                            Room's capacity is: @capacity4 <br>
                            Please define price per bed in this room <br>
                            <input type="number" min="1" name="roomprice3" placeholder="Price in local currency">
                        </div><!-- @end #room3 -->

                        <div class="tab-pane" id="room4">
                            <h3>Check the data below:</h3>
                            Room's name is: @room4 <br>
                            Room's type is: @type4 <br>
                            Room's capacity is: @capacity4 <br>
                            Please define price per bed in this room <br>
                            <input type="number" min="1" name="roomprice4" placeholder="Price in local currency">
                        </div><!-- @end #room 4 -->
                    </div><!-- @end .tab-content -->

                </div><!-- @end .span12 -->
            </div><!-- @end .row -->

            <input type="button" name="previous" class="previous action-button" value="Previous"/>
            <input type="submit" name="submit" class="submit action-button" value="Submit"/>
        </fieldset>
    </form>
</div>

<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- jQuery easing plugin -->
<script src="/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="/js/set-test.js" type="text/javascript"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap/bootstrap.js"></script>


</body>
</html>
