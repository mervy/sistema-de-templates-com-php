<?php

use Dotenv\Dotenv;
use App\framework\database\Connection;

$dotenv =  Dotenv::createImmutable(dirname(__FILE__,2));
$dotenv->load();

$connection = Connection::getConnection();

$query = $connection->query("select * from users");
var_dump($query->fetchAll());

routerExecute();