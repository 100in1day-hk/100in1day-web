
<?php

/*
$app->register(new Acme\DatabaseServiceProvider());

 */
$app['debug'] = true;
$app['server_url'] = 'http://localhost:8001';


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

$app['asset_path'] = $app['server_url'].'/resources';
$app['upload_path'] = $app['server_url'].'/upload';
$app['api_path'] = $app['server_url'].'/api';

