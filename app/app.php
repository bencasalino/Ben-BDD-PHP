<?php
    // required to link class files
    require_once __DIR__."/../vendor/autoload.php";
    // just one class needed
    require_once __DIR__."/../src/RepeatCounter.php";
    //new silex app
    $app = new Silex\Application();
    // turn debugger on
    $app['debug'] = true;
    // links silex and twig up
    $app->register(new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views'));


    $app->get("/", function() use ($app) {
        //Error message is initially set to a null string
        $message="";
        return $app['twig']->render('input_form.html.twig', array('message' => $message));
    });

    return $app;
?>
