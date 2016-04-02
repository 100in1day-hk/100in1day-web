
<?php

/*
$app->register(new Acme\DatabaseServiceProvider());

 */
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../web/views',
    ));
$app['asset_path'] = 'http://127.0.0.1/~samuelting/100in1day/resources';
