<?php

return [
    'get' => [
        '/' => 'HomeController@index',

    ],
    'post' => [
        '/login' => 'LoginController@store'
    ]
];
