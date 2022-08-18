<?php

namespace App\controllers;

class DashBoardController
{
    public function index()
    {
        var_dump("Estou na Dashboard protegida");
        var_dump($_SESSION);
    }
}
