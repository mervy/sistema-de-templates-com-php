<?php

use Dotenv\Dotenv;
use App\framework\database\Connection;

$dotenv =  Dotenv::createImmutable(dirname(__FILE__,2));
$dotenv->load();

routerExecute();