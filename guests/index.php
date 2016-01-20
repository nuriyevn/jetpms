<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order # 9999</title>
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/order/order.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Fav Icon here -->
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
</head>
<body>
<?php
include('../dashboard/navbar.php');
?>
<div class="container">
    <h1 id="guest" class="text-center"><a href="#" title="Manage Group order"></a> <a href="#"
                                                                                      title="View guest's folio">Familkin
            Mikhail Afanasievich</a></h1>

    <div class="row">
        <div class="col-md-offset-3 col-md-4">
            <h4>System age: 1 year, 2 moths, 7 days</h4>
        </div>

        <div class="col-md-2 col-md-offset-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pay
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Pay & CheckIn</a></li>
                    <li><a href="#">CheckIn</a></li>
                    <li><a href="#">Pay</a></li>
                    <li><a href="#">Pay & CheckOut</a></li>
                    <li><a href="#">CheckOut</a></li>
                    <li><a href="#">Refound</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table-responsive table-bordered table-striped">
                <tr>
                    <td class="guest_emails" colspan="2">Main personal info
                        <button type="button" class="btn btn-default btn-xs spoiler-trigger"
                                data-toggle="collapse"> Edit
                        </button>
                    </td>
                </tr>
                <div class="mail1">

                    <tr>
                        <td>Telephone</td>
                        <td>+380980238180</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>naum.oleks@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Last order</td>
                        <td>
                            <a href="#">#465 (-110, Checked in) </a>

                            <span class="panel-heading mail1">
                                <button type="button" class="btn btn-default btn-xs spoiler-trigger"
                                        data-toggle="collapse">
                                    View all orders
                                </button>
                            </span>
                            <div class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <h4>Rest all orders</h4>
                                    <table>
                                        <tr>
                                            <td><a href="#">#465 (-110, Checked out) </a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">#465 (-110, Checked out) </a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">#465 (-110, Checked out) </a></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </td>
                    </tr>
                </div>
                <!--                <tr>-->
                <!--                    <td>-->
                <!--                        <div class="panel-heading mail1">-->
                <!--                            <span class="from"><i class="fa fa-user"> </i> Guest</span>-->
                <!--                            <span class="subject">Order # 321</span>-->
                <!--                            <span class="mailing_date">friday, Nov 11, 2015</span>-->
                <!--                            <button type="button" class="btn btn-default btn-xs spoiler-trigger"-->
                <!--                                    data-toggle="collapse">View Mail-->
                <!--                            </button>-->
                <!--                        </div>-->
                <!--                        <div class="panel-collapse collapse out">-->
                <!--                            <div class="panel-body">-->
                <!--                                Architecto eveniet labore perferendis quod voluptates? Amet aperiam distinctio dolore,-->
                <!--                                exercitationem fugit illum laborum magnam molestias mollitia nostrum officiis possimus-->
                <!--                                quaerat quam quidem quod reiciendis repellendus soluta sunt temporibus voluptates?-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </td>-->
                <!--                </tr>-->
            </table>

        </div>
        <div class="col-md-6">

            <table class="table-responsive table-bordered table-striped">
                <tr>
                    <td class="guest_emails" colspan="2">Main statistic info</td>
                </tr>
                <tr>
                    <td>Current balance</td>
                    <td>+ 265</td>
                </tr>
                <tr>
                    <td>Total nights</td>
                    <td>26</td>
                </tr>
                <tr>
                    <td>Brought costumers</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Refferal income</td>
                    <td>648</td>
                </tr>

            </table>

            <table class="table-responsive table-bordered table-striped">
                <tr>
                    <td class="guest_emails">This Guest mails
                        <button type="button" class="btn btn-default btn-xs spoiler-trigger"
                                data-toggle="collapse"> Write a mail
                        </button>
                    </td>
                </tr>
                <div class="mail1">

                    <tr>
                        <td>
                            <div class="panel-heading mail1">
                                <span class="from"><i class="fa fa-home"> </i> Hostel</span>
                                <span class="subject">Order # 321</span>
                                <span class="mailing_date">friday, Nov 1, 2015</span>
                                <button type="button" class="btn btn-default btn-xs spoiler-trigger"
                                        data-toggle="collapse">View Mail
                                </button>
                            </div>
                            <div class="panel-collapse collapse out">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, quos,
                                    accusamus. Quidem, molestiae. Ipsam consequatur impedit voluptatem, quod qui
                                    perferendis fugiat. Eos adipisci dolorem doloremque quos debitis excepturi
                                    ex itaque!
                                </div>
                            </div>
                        </td>
                    </tr>
                </div>
                <tr>
                    <td>
                        <div class="panel-heading mail1">
                            <span class="from"><i class="fa fa-user"> </i> Guest</span>
                            <span class="subject">Order # 321</span>
                            <span class="mailing_date">friday, Nov 11, 2015</span>
                            <button type="button" class="btn btn-default btn-xs spoiler-trigger"
                                    data-toggle="collapse">View Mail
                            </button>
                        </div>
                        <div class="panel-collapse collapse out">
                            <div class="panel-body">
                                Architecto eveniet labore perferendis quod voluptates? Amet aperiam distinctio dolore,
                                exercitationem fugit illum laborum magnam molestias mollitia nostrum officiis possimus
                                quaerat quam quidem quod reiciendis repellendus soluta sunt temporibus voluptates?
                            </div>
                        </div>
                    </td>
            </table>
        </div>
    </div>

</div>
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/bootstrap/bootstrap.min.js"></script>
<script src="/order/order.js"></script>
</body>
</html>