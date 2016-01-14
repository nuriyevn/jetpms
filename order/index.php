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
    <h1 id="guest" class="text-center"><a href="#" title="Manage Group order"><i class="fa fa-users"> </i></a> <a href="#" title="View guest's folio">Familkin Mikhail Afanasievich</a></h1>

    <div class="row">
        <div class="col-md-2 col-md-offset-3 text-right">
            <h3>2 Beds</h3>
        </div>
        <div class="col-md-2 text-center">
            <h3>2 nights</h3>
        </div>
        <div class="col-md-2 text-left">
            <h3>436 Uah</h3>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pay
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Pay & CheckIn</a></li>
                    <li><a href="#">CheckIn</a></li>
                    <li><a href="#">Pay</a></li>
                    <li><a href="#">Pay & CheckOut</a></li>
                    <li><a href="#">CheckOut</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 text-right" id="telephone">
            <h4><a href="tel:+380980238180">+380980238180</a></h4>
        </div>
        <div class="col-md-4 text-center">
            <h4><a href="mailto:someone@example.com?Subject=Order%20#" target="_top">someone@example.com</a></h4>
        </div>
        <div class="col-md-4 text-left">
            <h4># <a href="#">956534470</a> (# <a href="#">123456</a>)</h4>
        </div>
    </div>

    <div class="row">
        <h4 class="text-center" id="cteated">from <a href="#" title="View all orders from this booker">Booking.com </a> at monday, Oct 26, 2015 22:30:49 </h4>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table-responsive table-bordered table-striped details_all">
                <tr id="details_bed">
                    <td>Bed # 21</td>
                    <td>
                        <button>Change Bed</button>
                    </td>
                </tr>
                <tr>
                    <td>Guest Name</td>
                    <td> Familkin Mikhail Afanfsievich</td>
                </tr>
                <tr>
                    <td>Category room</td>
                    <td>Bed in 4 beds mixed dorm</td>
                </tr>
                <tr>
                    <td>Check in:</td>
                    <td>friday, jan 8, 2016</td>
                </tr>
                <tr>
                    <td>Check out:</td>
                    <td>sunday, jan 10, 2016</td>
                </tr>
                <tr>
                    <td>Term of stay:</td>
                    <td> 2 nights</td>
                </tr>
                <tr>
                    <td>Commission breakdown:</td>
                    <td>
                        <table class="table-responsive table-bordered">
                            <tr>
                                <td>Total to charge:</td>
                                <td>218 uah</td>
                            </tr>
                            <tr>
                                <td>Comissiion:</td>
                                <td>32.7 uah</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Order status:</td>
                    <td>
                        <div class="status booked">Booked
                            <button>Change status</button>
                        </div>
                        at: monday, Oct 26, 2015
                    </td>
                </tr>
            </table>

            <table class="table-responsive table-bordered table-striped details_all">
                <tr id="details_bed">
                    <td>Bed # 22</td>
                    <td>
                        <button>Change Bed</button>
                    </td>
                </tr>
                <tr>
                    <td>Guest Name</td>
                    <td> Familkina Irina Sergeevna</td>
                </tr>
                <tr>
                    <td>Category room</td>
                    <td>Bed in 4 beds mixed dorm</td>
                </tr>
                <tr>
                    <td>Check in:</td>
                    <td>friday, jan 8, 2016</td>
                </tr>
                <tr>
                    <td>Check out:</td>
                    <td>sunday, jan 10, 2016</td>
                </tr>
                <tr>
                    <td>Term of stay:</td>
                    <td> 2 nights</td>
                </tr>
                <tr>
                    <td>Commission breakdown:</td>
                    <td>
                        <table class="table-responsive table-bordered">
                            <tr>
                                <td>Total to charge:</td>
                                <td>218 uah</td>
                            </tr>
                            <tr>
                                <td>Comissiion:</td>
                                <td>32.7 uah</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Order status:</td>
                    <td>
                        <div class="status canceled">Canceled
                            <button>Change status</button>
                        </div>
                        at: friday, Jan 1, 2016
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table-responsive table-bordered table-striped">
                <tr>
                    <td class="guest_emails">This Guest mails <button type="button" class="btn btn-default btn-xs spoiler-trigger"
                                                                      data-toggle="collapse"> Write a mail</button></td>
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