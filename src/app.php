
<?php

/*
$app->register(new Acme\DatabaseServiceProvider());

 */
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../web/views',
    ));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
		'driver'   => 'pdo_mysql',
		'host'      => 'localhost',
		'dbname'    => '100in1day',
		'user'      => '100in1day',
		'password'  => 'password',
		'charset'   => 'utf8',
		
    ),
));

$app['asset_path'] = 'http://127.0.0.1/~samuelting/100in1day/resources';
