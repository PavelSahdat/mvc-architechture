<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Office.php';

class OfficeController extends Controller
{
    function getSchool($request)
    {
        $id = $request['id'];
        $office = School::findById(+$id);
        $officeName =  $office['name'];
        $this->viewEngine
            ->setView('school')
            ->setData(array(
                'id' => $id,
                'name' => $officeName,
            ))
            ->render();
    }
}