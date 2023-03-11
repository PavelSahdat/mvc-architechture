<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/User.php';

class UserController extends Controller
{
    function getUser($request)
    {
        $id = $request['id'];
        $user = User::findById(+$id);
        $this->viewEngine
            ->setView('user')
            ->setData(array(
                'id' => $user['id'],
                'name' => $user['name'],
            ))
            ->render();
    }

    // Controller to show list of users
    function getUsers()
    {
        $users = User::fetchAll();
        foreach ($users as $user) {
            echo $user['name'] . '<br>';
        }
    }

    // Controller to show user form route
    function showUserForm($request)
    {
        $this->viewEngine
            ->setView('user/user-form')
            ->render();
    }

    // Controller for create route
    function createUser($request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        $this->redirect('/users');
    }
}
