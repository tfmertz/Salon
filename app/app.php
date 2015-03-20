<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../setup.config';

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('homepage.twig');
    });

    $app->post('add_stylist', function() use ($app) {
        return $app['twig']->render('homepage.twig');
    });


    return $app;

 ?>
