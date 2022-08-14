<?php

namespace App\controllers;

class LoginController
{
    public function index()
    {
        $data = [
            'name' => 'Rogério Soares',
            'pass' => 'sjjsidsd89a88sdf8ajjs9902dksl'
        ];

        var_dump($data);
    }

    public function store()
    {
        var_dump('login');
    }
}
