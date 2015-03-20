<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../setup.config';

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon', $DB_USER, $DB_PASS);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));


    $app->get('/', function() use ($app) {
        return $app['twig']->render('homepage.twig', array('stylist_array' => Stylist::getAll()));
    });

    $app->post('add_stylist', function() use ($app) {
        $new_stylist = new Stylist(pg_escape_string($_POST['stylist']));
        $new_stylist->save();
        return $app['twig']->render('homepage.twig', array('stylist_array' => Stylist::getAll()));
    });

    $app->post('delete_all', function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('homepage.twig', array('stylist_array' => []));
    });


    return $app;

 ?>
