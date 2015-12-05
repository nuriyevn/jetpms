<?php

$script_parent_dir = __DIR__;
$document_root = $_SERVER["DOCUMENT_ROOT"];
$http_host = $_SERVER['HTTP_HOST'];
$script_parent_dir = str_replace($document_root, $http_host, $script_parent_dir);

if ($_POST['csubmit'] == 'Calculate') {
    $bedscount = $_POST['amountofbeds'];
    $country = $_POST['country'];

    //var_dump($bedscount);
    //var_dump($country);

    switch ($bedscount) {
        case 1:
            $b_price = 2;
            $bedscount = "from 1 to 10";
            break;
        case 2:
            $b_price = 5;
            $bedscount = "from 11 to 18";
            break;
        case 3:
            $b_price = 10;
            $bedscount = "from 19 to 26";
            break;
        case 4:
            $b_price = 12;
            $bedscount = "more than 26";
            break;
    }

    switch ($country) {
        case 1:
            $b_price *= 1;
            $country = "Ukraine";
            break;
        case 2:
            $b_price *= 1.25;
            $country = "Russia";
            break;
        case 3:
            $b_price *= 1.5;
            $country = "Another country";
            break;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jet PMS</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/id.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>


<div class="blue_block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-6">
                <div class="btn-group">
                    <a href="#" class="btn btn-lg btn-primary">Продукт</a>
                    <a href="#" class="btn btn-lg btn-primary">Цена</a>
                    <a href="#" class="btn btn-lg btn-primary">Контакты</a>
                </div>
            </div>
            <div class="col-md-2" id="login_split">
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-lg">Войти</button>
                    <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span> <!-- caret -->
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>

                    <ul class="dropdown-menu" role="menu"> <!-- class dropdown-menu -->
                        <li><a href="#">Войти</a></li>
                        <li><a href="#">Зарегистрироваться</a></li>
                        <!--li class="divider"></li>
                        <li><a href="#">Google +</a></li-->
                    </ul>
                </div>
            </div>
        </div>

        <p style="font-size: 60px"><b>Jet PMS</b></p>

        <h2>Облачная система автоматизации хостелов<br>Один продукт и идеальный!</h2>

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <ul class="blue_block_list">
                        <li class="glyphicon glyphicon-ok"> Полная автоматизация работы хостела.Автоматическое
                            выставление счетов и платежей. Отчеты
                        </li>
                        <li class="glyphicon glyphicon-ok"> 2 way синхронизация со всеми популярными OTA booking.com,
                            hostelworld.com, ostrovok.ru и другие
                        </li>
                        <li class="glyphicon glyphicon-ok"> Документооборот адаптирован для Украины</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="blue_block_list">
                        <li class="glyphicon glyphicon-ok"> Работа с ПК и мобильными устройствами</li>
                        <li class="glyphicon glyphicon-ok"> Не требует покупки дополнительного оборудования</li>
                        <li class="glyphicon glyphicon-ok"> 120 дней БЕСПЛАТНОГО пользования</li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <p><a href="#">
                        <button type="button" class="btn btn-danger btn-lg">Попробуйте бесплатно</button>
                    </a> <a href="#">
                        <button type="button" class="btn btn-success btn-lg">Демо версия</button>
                    </a></p>
            </div>
        </div>
    </div>
    <div class="container">
        Мы гарантируем возврат средств в течении 30 дней с момента первой оплаты, если Вам, по каким либо причинам не
        понравится наш продукт.
    </div>
</div>
<div class="container">
    <h1><b>Уникальность и доступность системы позволит легко продавать номера и автоматизировать управление хостелом</b>
    </h1>
    <hr align="center">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="img/jet_logo.png" alt="Oye_logo">
                <a href="#"><h2>Jet PMS</h2></a><br>система для автоматизации хостела
                <ul>
                    <li class="glyphicon glyphicon-check">Выставляйте на продажу весь номерной фонд в системах
                        online-бронирования и на рецепции в одной программе
                    </li>
                    <li class="glyphicon glyphicon-check">Управляйте всеми операциями в хостеле, используя одно
                        приложение
                    </li>
                    <li class="glyphicon glyphicon-check">Выставляйте счета, платежи, отправляйте подтверждения о
                        бронировании
                    </li>
                    <li class="glyphicon glyphicon-check">Формируйте отчеты, планируйте продажи номеров</li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="img/Chanel_manager_logo.png" alt="Chanel_manager_logo.png">
                <a href="#"><h2>Channel Manager</h2></a><br>инструмент управления online продажами
                <ul>
                    <li class="glyphicon glyphicon-check">Обновляйте информацию об хостеле во всех системах бронирования
                        одновременно
                    </li>
                    <li class="glyphicon glyphicon-check">Редактируйте стоимость и наличие номерного фонда из одного
                        интерфейса
                    </li>
                    <li class="glyphicon glyphicon-check">Экономьте свое время на работу с ОТА-системами</li>
                    <li class="glyphicon glyphicon-check">При отмене бронирования, номер автоматически выставляется на
                        продажу
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="img/Booking_buttom_logo.png" alt="OBooking_buttom_logo">
                <a href="#"><h2>Booking Button</h2></a><br>модуль online бронирования на сайте отеля
                <ul>
                    <li class="glyphicon glyphicon-check">Продавайте номера напрямую через сайт – удобно и без
                        посредников
                    </li>
                    <li class="glyphicon glyphicon-check">Позволяйте вашим гостям осуществлять бронь всего в пару
                        кликов
                    </li>
                    <li class="glyphicon glyphicon-check">Отслеживайте посетителей сайта и улучшайте конверсию</li>
                    <li class="glyphicon glyphicon-check">При бронировании номер автоматически снимается с продажи на
                        всех порталах
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <buttom class="btn btn-primary btn-md">подробнее</buttom>
            </div>
            <div class="col-md-4">
                <buttom class="btn btn-primary btn-md">подробнее</buttom>
            </div>
            <div class="col-md-4">
                <buttom class="btn btn-primary btn-md">подробнее</buttom>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-md-offset-1">
                <img src="img/online-manager.png" alt="online-manager_logo">

                <p>Online управление отелем</p>
            </div>
            <div class="col-md-2">
                <img src="img/bron.png" alt="bron_logo">

                <p>Бронирование номера с вашего сайта</p>
            </div>
            <div class="col-md-2"><img src="img/2way.png" alt="2way_logo">

                <p>2way синхронизация с системами онлайн бронирования</p>
            </div>
            <div class="col-md-2">
                <img src="img/save.png" alt="save_logo">

                <p>Надежность хранения данных</p>
            </div>
            <div class="col-md-2">
                <img src="img/help.png" alt="help_logo">

                <p>Техническая поддержка 24/7</p>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
<div class="container">
    <img src="img/baner.png" alt="baner" width="100%" class="margin">
</div>
<div class="container">
    <h1><b>Преимущества работы с PMS Сloud</b></h1>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <p><img src="img/deva.png" alt="deva_logo"></p>

            <p><b>Работа с любыми устройствами</b></p>

            <p class="text-primary small"><b>Управляйте отелем с компьютера и любых мобильных устройств</b></p>
            <hr>
            <p class="text-muted small">Система автоматизации гостиничного бизнеса PMS Cloud работает, как на
                стационарных ПК, так и на мобильных устройствах. Вы не привязаны к своему рабочему месту, а
                контролировать рабочий процесс можете повсюду. Все, что вам нужно для работы – это доступ к
                Интернету.</p>
        </div>
        <div class="col-md-4">
            <p><img src="img/inova.png" alt="inova_logo"></p>

            <p><b>Инновационность</b></p>

            <p class="text-primary small"><b>Осуществляйте продажи через Интернет</b></p>
            <hr>
            <p alass="text-muted small">Наша система для отелей позволяет автоматизировать все важные бизнес-процессы,
                такие как: заселяемость номерного фонда, контроль сезонов, тарифов и цен, финансовая аналитика, учет и
                контроль работы Вашего персонала, но наиболее важным аспектом является, продажа номеров отеля онлайн.
                Благодаря PMS Cloud, вы можете добавлять пользователей с разным уровнем доступа, управлять финансами,
                контролировать действия сотрудников – без ограничений. Подключайтесь ко всем OTA системам, работайте
                online и Вы получите увеличение прибыли вашего отеля.
            </p>
        </div>
        <div class="col-md-4">
            <p><img src="img/share.png" alt="share_logo"></p>

            <p><b>Доступность</b></p>

            <p class="text-primary small"><b>PMS Cloud имеет обширный функционал, но работать с ним проще простого</b>
            </p>
            <hr>
            <p class="text-muted small">Красивый, яркий, интуитивно понятный интерфейс программы разработан таким
                образом, чтобы в нем было приятно и просто работать. Все кнопки и меню легкодоступны, вы выполняете все
                операции в несколько кликов.</p>
        </div>
    </div>
    <div class="blue_block">
        <div class="container">
            <div class="row" id="calc">
                <h1><b>Calculate the cost</b></h1><br>

                <h3>this page contain base form which will calculate monthly price for using JetPMS</h3>
                <h4><br>Price depends on: <b>amount of beds and country</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <table class="center-table">
                        <tr>
                            <td>Amount of beds</td>
                            <td>
                                <select name="amountofbeds" id="" class="btn-primary">
                                    <option disabled selected>How many beds</option-->
                                    <option value="1">from 1 to 10</option>
                                    <option value="2">from 11 to 18</option>
                                    <option value="3">from 19 to 26</option>
                                    <option value="4">more than 26</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>
                                <select name="country" id="" class="btn-primary">
                                    <option disabled selected>What country hostel from?</option>
                                    <option value="1">Ukraine</option>
                                    <option value="2">Russia</option>
                                    <option value="3">Another country</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <a href="#calc"><p><input type="button" class="btn-success" name="csubmit" value="Calculate"
                                              id="calc_button"></p></a>

                </form>
            </div>
            <div class="col-md-6">
                <h1 id="price">
                    <?php
                    if ($_POST["csubmit"] == 'Calculate') {
                    echo $b_price . " "; ?> $ / month</h1>
                <?php
                }
                ?>
            </div>
        </div>
<!--        --><?php
//        if ($_POST["csubmit"] == 'Calculate') {
//
//            ?>
<!--            <div class="row">-->
<!--                <div class="col-md-offset-2 col-md-8">-->
<!--                    <table class="center-table">-->
<!--                        <tr>-->
<!--                            <td colspan="2"><p>Like price and features? <br> Do register in one easy single step. </p>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>Hostel's corporate e-mail:</td>-->
<!--                            <td>-->
<!---->
<!--                                <input hidden name="bedscount" value="--><?php //echo $bedscount; ?><!--">-->
<!--                                <input hidden name="country" value="--><?php //echo $country; ?><!--">-->
<!--                                <input hidden name="b_price" value="--><?php //echo $b_price; ?><!--">-->
<!--                                <input required type="email" name="email" value="jetpmscom@gmail.com">-->
<!---->
<!---->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td colspan="2">-->
<!--                                <input type="submit" class="btn-success" name="csubmit" value="Do register">-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php
//
//        }
//        ?>

    </div>
    <div class="row">
        <div class="col-md-10">
            <h1 id="happy_clients"><b><i>Довольные клиенты</i></b></h1>
            <hr>

            <a href="#">
                <div class="col-md-4 client_block">
                    <img src="img/hotel_1.jpg" alt="hotel_1" class="hotel_logo">
                    <h4 class="hotel_name">Отель "Беспечный тюлень"</h4>
                    <h4 class="hotel_city"><b>Сахалин</b></h4>

                    <p class="hotel_comments">Погожего тюленьего утречка! Начиная сотрудничать с Вами, даже не могли
                        предположить, что Ваш продукт настолько кавественный и удобный в обращении. Все интуитивно
                        понятно
                        даже тюленю. Спасибо<br><br></p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-4 client_block">
                    <img src="img/hotel_2.jpg" alt="hotel_2" class="hotel_logo">
                    <h4 class="hotel_name">Апартаменты "Лежбище тюленей"</h4>
                    <h4 class="hotel_city"><b>Берега Охотского моря</b></h4>

                    <p class="hotel_comments">Наше лежбище только недавно стало пользоваться услугами ДЖЕТПМС, но уже с
                        первого дня нами было высоко оценено учтивое и оперативное обслуживание<br><br><br></p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-4 client_block">
                    <img src="img/hotel_3.jpg" alt="hotel_3" class="hotel_logo">
                    <h4 class="hotel_name">Загородный клуб "Тюлененок"</h4>
                    <h4 class="hotel_city"><b>Побережье Тихого океана</b></h4>

                    <p class="hotel_comments">Загородный клуб "Тюлененок" уже несколько месяцев пользуется данным
                        сайтом,
                        поток тюленей-клиентов существенно увеличился, гораздо удобнее бронировать места, очень довольны
                        приятным дизайном</p>
                </div>
            </a></div>
    </div>

    <hr>
    <div class="row">
        <h1><b>Технология системы</b></h1>

        <p><img src="img/tehno.png" alt="tehno_logo"></p>

        <p class="text-muted small">Использование облачных технологий обеспечивает стабильность работы, гарантию
            безопасности данных, доступ из любой точки планеты. Для работы с PMS Cloud не нужна установка и настройка
            дополнительного оборудования, а также его обслуживание. Вы можете быть абсолютно уверены, что все данные
            находятся в безопасности.</p>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-offset-5">
            <a href="#">
                <button type="button" id="button_hr">все отзывы</button>
            </a>
        </div>
        <hr>
    </div>
</div>
<div class="blue_block" id="second_blue_block">
    <img src="img/clock.png" alt="clock_logo" class="margin">

    <p style="font-size: 40px">Мы вас поддерживаем 24/7</p>

    <p style="font-size: ">Наши специалисты обеспечивают техническую и информационную поддержку в любой день и в любое
        время суток
        <br>Мы оперативно решаем все вопросы, связанные с работой системы
        <br>Вы находитесь в надежных руках опытных специалистов</p>

    <p><a href="#">
            <button type="button" class="btn btn-danger btn-lg">Попробуйте бесплатно</button>
        </a> <a href="#">
            <button type="button" class="btn btn-success btn-lg">Демо версия</button>
        </a></p>
</div>
</body>
<footer class="blue_block">
    Copyright © 2014 bla-bla-bla
</footer>
</html>
