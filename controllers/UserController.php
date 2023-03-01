<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/User.php';

class UserController extends Controller
{
    function getUser($request)
    {
        $id = $request['id'];
        $user = User::findById(+$id);
        $userName =  $user['name'];
        $this->viewEngine
            ->setView('user')
            ->setData(array(
                'id' => $id,
                'name' => $userName,
            ))
            ->render();
    }
    function getCountUser(){

    }
}
