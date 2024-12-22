<?php
use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind(Database::class, function() {
    $config = require base_path("config.php");
    $dbConfig =  $config["database"];
    
    return new Database($dbConfig["conection"], $dbConfig["user"], $dbConfig["password"]);
});

App::setContainer($container);

