<?php
if (isset($_POST['step1'])) {
    $step1 = $_POST['step1'];
}
if (isset($_POST['step2'])) {
    $step2 = $_POST['step2'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JetPMS [Set up step first]</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">


</head>
<body>
<div class="container">

    <!----- step one begins here ------------------------------------------------------------------->

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

    <!----- step two begins here --------------------------------------------------------------------->
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
        for ($i = 0; $i < $roomscount; $i++) {
            ?>
            <hr>
            <h3>Room # <?php echo $i + 1; ?></h3>
            <table>
                <tr>
                    <td>
                        Give a name for this room: <br>
                        <input required type="text" name="room<?php echo $i + 1; ?>">
                    </td>
                    <td>
                        Define the type for this room: <br>
                        <select required name="roomtype<?php echo $i + 1; ?>" id="">
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
                        <input required type="number" name="roomcapacity<?php echo $i + 1; ?>" min="1" max="24">
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
    if (isset($step2)) {
    var_dump($_POST);

    ?>
    <h2>Configuring the prices</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-1" data-toogle="tab">Вкладка 1</a></li>
                        <li><a href="#tab-2" data-toggle="tab">Вклада 2</a></li>
                        <li><a href="#tab-3" data-toggle="tab">Вкладка 3</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-1">
                            <p>First paragraf</p>
                        </div>
                        <div class="tab-pane fade" id="tab-2">
                            <p>Second paragraf</p>
                        </div>
                        <div class="tab-pane fade" id="tab-3">
                            <p>Third paragraf</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

</div>

</body>
</html>