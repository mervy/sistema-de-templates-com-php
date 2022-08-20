<?php

namespace App\framework\classes;

class Macros
{

    public function session(string $session)
    {
        return $_SESSION[$session] ?? '';
    }

    public function lower(string $text)
    {
        return strtolower($text);
    }

    public function upper(string $text)
    {
        return strtoupper($text);
    }

    function resume(string $string, int $chars)
    {
        return mb_strimwidth($string, 0, $chars + 4, " ...");
    }
}
