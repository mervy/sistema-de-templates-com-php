<?php

$data = ['name' => 'Rogério Soares'];

ob_start();

extract($data);

require "home.php";

$content =  ob_get_contents();

ob_end_clean();

var_dump('content', $content);
