<?php

namespace App\controllers;

class DashBoardController
{
    public function index()
    {
        view('dashboard_home', 
        [
           'title' => "Dashboard - Home",
           'css' => 'custom.css'
        ]);
    }
}
