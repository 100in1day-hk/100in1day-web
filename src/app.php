
<?php

/*
$app->register(new Acme\DatabaseServiceProvider());

 */
$app['debug'] = true;
$app['server_url'] = 'http://127.0.0.1/~samuelting';


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

$app['asset_path'] = $app['server_url'].'/100in1day/resources';
$app['upload_path'] = $app['server_url'].'/upload';

