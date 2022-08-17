<?php

namespace App\controllers;

use App\framework\database\Connection;


class LoginController
{
    public function index()
    {
        var_dump('index do login no <strong>LoginController</strong>');
    }

    public function store()
    {


        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($email) || empty($password)) {
            var_dump('Usuário ou senha inválidos');
            die();
        }

        $connect = Connection::getConnection();

        $prepare = $connect->prepare("select * from users where email = :email");
        $prepare->execute([
            'email' => $email
        ]);

        $userFound = $prepare->fetchObject();

        var_dump($userFound);
    }
}
