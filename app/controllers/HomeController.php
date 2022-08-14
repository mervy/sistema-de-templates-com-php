<?php

namespace App\controllers;

class HomeController
{

    public function index()
    {
        view('home', [
            'name' => 'Rogério Soares',
            'email' => 'rgrsoares@yahoo.com.br'
        ]);
    }
}
