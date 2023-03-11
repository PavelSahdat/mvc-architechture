<?php
require_once __DIR__ . '/../framework/Application.php';

class Controller
{
    protected $viewEngine;
    public function __construct()
    {
        $this->viewEngine = Application::getInstance()->make('view engine');
    }

    protected function redirect($route)
    {
        header("Location: $route");
    }
}
