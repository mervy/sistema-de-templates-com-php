<?php

namespace App\framework\classes;

use Exception;

class Auth
{
    public static function check(string $type)
    {
        $sessionValue = $_SESSION['logged'];
        return match($type){
            'auth'=> !isset($sessionValue) ? redirect('/') : '',           
        default =>
            throw new Exception("Error accessing protected page ".__CLASS__, 1)      
        };
    }
}
