<?php

namespace App\framework\classes;

use Exception;

class Auth
{
    public static function check(string $type)
    {
        switch ($type) {
            case 'auth':
                if (!isset($_SESSION['logged'])) {
                    return redirect('/');
                }
                break;
            default:
                throw new Exception("Error accessing protected page ".__CLASS__, 1);                
                break;
        }
    }
}
