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
        //Error message if user enters nothing and hits submit, i think it might be easier to add "required" at the of twig views instead 
        $message="";
        return $app['twig']->render('input_form.html.twig', array('message' => $message));
    });
    // CRUD link to the results view page to show the final message
    $app->get("/results", function() use ($app) {
        $new_RepeatCounter = new RepeatCounter;
        $input_word = $_GET['input_word'];
        $input_string = $_GET['input_string'];

        if($new_RepeatCounter->checkNullInputs($input_word, $input_string)){
            // shows error message if only one input is filled in by user
            $message = "Please fill in both forms";
            return $app['twig']->render('input_form.html.twig', array('message' => $message));
        }

        elseif($new_RepeatCounter->checkInputWord($input_word)) {
            // shows an error message if user tries more than 1 input word
            $message = "Please use only one word to search for";
            return $app['twig']->render('input_form.html.twig', array('message' => $message));
        }
        //This route renders the results page to show the final matching count
        else {
            $count = $new_RepeatCounter->countRepeats($input_word, $input_string);
            return $app['twig']->render('results.html.twig', array('count' => $count, 'input_word' => $input_word, 'input_string' => $input_string));
        }
    });
    return $app;
?>
