<!--Закончил разработку этого файла, переаю Нусрату-->
<?php
if (isset($_POST['step1']))
{
    $step1 = $_POST['step1'];
}
if (isset($_POST['step2']))
{
    $step2 = $_POST['step2'];
}


if (isset($_POST['step3']))
{
    $step3 = $_POST['step3'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JetPMS [Set up step first]</title>

    <!-- Bootstrap -->
    <!--    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/id.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container" id="set">

    <!--- - - step one begins here - - - - - - - - - - - - -  -->

    <?php
    if (!isset($step1) && !isset($step2))
    {
    ?>

    <h1>Welcome to JetPMS!</h1>

    <h2>Adding rooms</h2>

    <p>that is important to add properly room and rates in order to let the rooms to be sold</p>

    <h3>How many rooms in your hostel?</h3>

    <p>FOR EXAMPLE: <br> in Mama hostel there are four rooms:
    <ul>
        <li>Private ensuite double room</li>
        <li>Shared mixed dorm for four</li>
        <li>Shared female dorm for eight</li>
        <li>Shared mixed dorm for eight</li>
    </ul>
    ANOTHER EXAMPLE: <br>in Centro Hostel there are three rooms:
    <ul>
        <li>Shared mixed dorm for eight</li>
        <li>Shared female dorm for eight</li>
        <li>Shared mixed dorm for eight</li>
    </ul>
    <h3>So, how many rooms in the hostel?</h3>

    <form action="" method="post">
        <input type="number" name="roomscount" min="1" max="99">
        <input type="submit" name="step1" value="next">
    </form>
    </p>

    <!-- - step two begins here - - - - - - - -  -->
    <?php
    }elseif (isset($step1) && !isset($step2))
    {
    ?>
    <h2>Configuring the rooms</h2>
    <?php
    $roomscount = $_POST['roomscount'];
    ?>
    <form action="" method="post">
        <?php
        for ($i = 0; $i < $roomscount; $i++)
        {
            ?>
            <hr>
            <h3>Room # <?php echo $i + 1; ?></h3>
            <table>
                <tr>
                    <td>
                        Give a name for this room: <br>
                        <input required type="text" name="nazv<?php echo $i + 1; ?>">
                    </td>
                    <td>
                        Define the type for this room: <br>
                        <select required name="type<?php echo $i + 1; ?>" id="">
                            <option value="Ensuite single">Ensuite single</option>
                            <option value="Ensuite double">Ensuite double</option>
                            <option value="Private single">Private single</option>
                            <option value="Private double">Private double</option>
                            <option value="Shared mixed dorm">Shared mixed dorm</option>
                            <option value="Shared female dorm">Shared female dorm</option>
                            <option value="Shared male dorm">Shared male dorm</option>
                        </select>
                    </td>
                    <td>
                        Define capacity of this room: <br>
                        <input required type="number" name="capacity<?php echo $i + 1; ?>" min="1" max="24">
                    </td>
                </tr>
            </table>
            <?php
        }
        ?>
        <br><br>
        <input type="submit" name="step2" value="next">
        <br><br>
        <hr>
        <?php
        }
        ?>
    </form>

    <!------- step three begins here -------------------------------------------------------------------------------->

    <?php
    if (isset($step2))
    {
    //    var_dump($_POST);
    $r = (int)(count($_POST) / 3);

    ?>
    <h2>Configuring the prices</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <form action="thx.php" method="post">
                    <table id="table-set">
                        <tr>
                            <th>ROOM NAME</th>
                            <th>ROOM TYPE</th>
                            <th>CAPACITY, <sub>pers.</sub></th>
                            <th>PRICE</th>
                        </tr>
                        <?php
                        for ($i = 0; $i < $r; $i++)
                        {
                            ?>
                            <tr>
                                <td><?php echo($_POST["nazv" . ($i + 1)]); ?></td>
                                <td><?php echo($_POST["type" . ($i + 1)]); ?></td>
                                <td><?php echo($_POST["capacity" . ($i + 1)]); ?></td>
                                <td><input type="number" value="0" min="0"></td>
                            </tr>
                            <?php
                        }

                        ?>
                    </table>
                    <br><br>
                    <input type="submit" class="btn-success" name="register" value="SAVE">
                </form>
            </div>
            <?php

            }
            ?>


        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>