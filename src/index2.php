<!doctype html>
<html ng-app>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.6/angular.min.js"></script>
    <script src="./scripts/js/todo.js"></script>
    <link rel="stylesheet" href="./css/todo.css">
</head>
<body>

<h1>Main web site's page</h1>

<p>Here I will put general description of workflow</p>

<h2>task for Nusrat</h2>
<ol>
    <li>create config files to connect this script to postgre DB</li>
    <li>refresh files on web server jetpms.com</li>
    <li>create a table to save assigned and finished tasks</li>
    <li>сделать так, чтоб у список дел подгружался из базы</li>
    <li>сделать так, чтоб можно было просмотреть выполненые таски</li>
</ol>

<ol class="done-true">
    <li>index.php file should be designed as landing page</li>
    <li>in some place we will put calc which calculate price for service as far price depens on^
        <ul>
            <li>count of beds</li>
            <li>hostel's country</li>
            <li>stage of web development</li>
        </ul>
    </li>
    <li>also we will place several buttons forwarding to sign up page
        <ul>
            <li>later signup page will be built in index page</li>
        </ul>
    </li>
</ol>

<h2>Список дел</h2>

<div ng-controller="TodoCtrl">
    <span>Осталось {{remaining()}} из {{todos.length}}</span>
    [ <a href="" ng-click="archive()">очистить</a> ]
    <ul class="unstyled">
        <li ng-repeat="todo in todos">
            <input type="checkbox" ng-model="todo.done">
            <span class="done-{{todo.done}}">{{todo.text}}</span>
        </li>
    </ul>
    <form ng-submit="addTodo()">
        <input type="text" ng-model="todoText" size="30"
               placeholder="впишите новое дело">
        <input class="btn-primary" type="submit" value="добавить">
    </form>
</div>
</body>
</html>