<?php
    // Don't have to start session  , as in the parent script it has been already started
    // session_start();

?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">[HOSTEL #9999]</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/dashboard/">Dashboard <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Mail</a></li>
                <li><a href="/accounting/index.php">Accounting</a></li>
                <li><a href="#">Todos</a></li>
                <li><a href="#">Settings</a></li>

            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>

            </form>

            <ul class="nav navbar-nav navbar-right">

                <li><a id="username_link" href="#">CURRENT USER</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Actions <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Change User</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/login/doLogout.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
