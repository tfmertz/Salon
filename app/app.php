<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../src/Client.php';
    require_once __DIR__.'/../setup.config';

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon', $DB_USER, $DB_PASS);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //GO TO HOMEPAGE
    $app->get('/', function() use ($app) {
        return $app['twig']->render('homepage.twig', array('stylist_array' => Stylist::getAll()));
    });

    $app->post('delete_all', function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('homepage.twig', array('stylist_array' => []));
    });

    $app->post('add_stylist', function() use ($app) {
        $new_stylist = new Stylist(pg_escape_string($_POST['stylist']));
        $new_stylist->save();
        return $app['twig']->render('homepage.twig', array('stylist_array' => Stylist::getAll()));
    });

    $app->delete('/stylists/{id}', function($id) use ($app) {
        $new_stylist = Stylist::find($id);
        $new_stylist->delete();
        return $app['twig']->render('homepage.twig', array('stylist_array' => Stylist::getAll()));
    });

    //GO TO STYLIST PAGE
    $app->get('/stylists/{id}', function($id) use ($app) {
        $new_stylist = Stylist::find($id);
        $clients = $new_stylist->getClients();
        return $app['twig']->render('view_stylist.twig', array('stylist' => $new_stylist, 'client_array' => $clients));
    });

    $app->post('/stylists/add_client', function() use ($app) {
        $stylist_id = pg_escape_string($_POST['stylist_id']);
        $new_client = new Client(pg_escape_string($_POST['client']), $stylist_id);
        $new_client->save();
        $new_stylist = Stylist::find($stylist_id);
        $clients = $new_stylist->getClients();
        return $app['twig']->render('view_stylist.twig', array('stylist' => $new_stylist, 'client_array' => $clients));
    });

    $app->patch('/stylists/{id}', function($id) use($app) {
        $new_stylist = Stylist::find($id);
        $new_stylist->update(pg_escape_string($_POST['name']));
        return $app['twig']->render('view_stylist.twig', array('stylist' => $new_stylist, 'client_array' => $new_stylist->getClients()));
    });

    //GO TO EDIT PAGE
    $app->get('/stylists/{id}/edit', function($id) use ($app) {
        $new_stylist = Stylist::find($id);

        return $app['twig']->render('edit_stylist.twig', array('stylist' => $new_stylist));
    });

    return $app;

 ?>
