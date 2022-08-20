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

    function resume(array $data)
    {
        [$string, $chars] = $data;
        return mb_strimwidth($string, 0, $chars + 4, " ...");
    }

    function mostrarTresValores(array $data)
    {
        [$var1,$var2, $var3] = $data;
        echo $var1. ' - '. $var2 . ' - '.$var3;
    }
}
