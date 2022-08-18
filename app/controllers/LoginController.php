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
            var_dump('Please fill in all fields!');
            die();
        }

        $connect = Connection::getConnection();

        $prepare = $connect->prepare("select * from users where email = :email");
        $prepare->execute([
            'email' => $email
        ]);

        $userFound = $prepare->fetchObject();

        if (!$userFound) {
            var_dump('User is not registered!');
            (die());
        }

        if (!password_verify($password, $userFound->password)) {
            var_dump('The password is not correct!');
            die();
        }

        $_SESSION['logged'] = true;
        unset($userFound->password); //Retiro a senha da consulta
        $_SESSION['user'] = $userFound;

        return redirect('/dashboard');
    }
}
