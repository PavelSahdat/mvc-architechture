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


//--------------------------------------------------------------------------//

// CRUD -> Create, Read, Update, Delete
// Create route


// To show form for creating user
$router-> add('/user/create/form','GET',array(
    'controller'=>'UserController@showUserForm',
));

// To handle form submission for creating user
$router->add('/user/create', 'POST', array(
    'controller' => 'UserController@createUser',
));

// To show list of users
$router->add('/users', 'GET', array(
    'controller' => 'UserController@getUsers',
));

// ----------------------------------------------------------------------------------//
// To show form for creating School
$router->add('/school/create/form','GET',array(
    'controller'=>'SchoolController@showSchoolForm',
));
$router->add('/school/create','POST',array(
    'controller'=> 'SchoolController@createSchool',
));

$router-> add('/schools','GET',array(
    'controller'=> 'SchoolController@getSchools',
));
