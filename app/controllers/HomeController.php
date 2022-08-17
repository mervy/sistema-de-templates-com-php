<?php

namespace App\controllers;

use App\framework\database\Connection;

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
