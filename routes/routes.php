<?php
require_once "./framework/Application.php";

$router = Application::getInstance()->make('router');
$router->add('/users', 'GET', array(
    'callback' => function ($request) {
        $id = $request['id'];
        return "User id is $id";
    }
));

$router->add('/user/profile', 'GET', array(
    'controller' => 'UserController@getUser'
));
