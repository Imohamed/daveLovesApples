<?php

//  require database
//require_once 'config/DbHandler.php';
// test connection
//$db = new DbHandler();

function __autoload($class) {
    require_once 'config/' . $class . '.php';
}


$dbh = new DbHandler();
$provider = $dbh->getProvider(1);
var_dump($provider);
