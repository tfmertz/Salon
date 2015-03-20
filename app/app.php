<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../setup.config';

    $app = new Silex\Application();


    $app->get('/', function() {
        return "Hello";
    });


    return $app;

 ?>
