<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/School.php';

class UserController extends Controller
{
    function getUser($request)
    {
        $id = $request['id'];
        $user = School::findById(+$id);
        $userName =  $user['name'];
        $this->viewEngine
            ->setView('user')
            ->setData(array(
                'id' => $id,
                'name' => $userName,
            ))
            ->render();
    }
}
