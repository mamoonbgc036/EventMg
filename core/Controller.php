<?php
namespace Core;

class Controller
{
    public function view($view, $data = [])
    {
        require_once ROOT . '/app/views/' . $view . '.php';
    }
}