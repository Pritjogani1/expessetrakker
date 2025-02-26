<?php
use Core\App;
use Core\Container;
use Core\Database;

$container = new \Core\Container();
$container->bind('Core\Database', function(){
    $config = require base_path("config.php");
   return new Database($config);
});

 $container->resolve('Core\Database');

App::setContainer($container);