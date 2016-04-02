<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require_once __DIR__.'/../src/app.php';
require_once __DIR__.'/../web/controllers/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app->match('/', function() use ($app){
    return $app['twig']->render('index.html');
});



$app->run();
