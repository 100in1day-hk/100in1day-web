<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require_once __DIR__.'/../src/app.php';
require_once __DIR__.'/../web/controllers/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app->match('/', function() use ($app) {
    /*
	$query = $app['db']->createQueryBuilder()
				->select("idproject, projectName, projectDescription, projectHolder")
				->from("project");

	$projects = $app['db']->fetchAll($query);

	$query = $app['db']->createQueryBuilder()
				->select("idproject, projectLinkUrl, projectLinkTitle")
				->from("project_link");

	$projectLinks = $app['db']->fetchAll($query);

	$query = $app['db']->createQueryBuilder()
				->select("idproject, photoName, photoDescription, photoUrl")
				->from("project_photo");

	$projectPhotos = $app['db']->fetchAll($query);

	$query = $app['db']->createQueryBuilder()
				->select("idworkshop, workshopName, workshopDate, workshopDescription")
				->from("workshop");

	$workshops = $app['db']->fetchAll($query);

	$query = $app['db']->createQueryBuilder()
				->select("workshopLinkUrl, workshopLinkTitle")
				->from("workshop_link");
	$workshopLinks = $app['db']->fetchAll($query);


	$query = $app['db']->createQueryBuilder()
				->select("idworkshop, photoName, photoDescription, photoUrl")
				->from("workshop_photo");
	$workshopPhotos = $app['db']->fetchAll($query);

	for($i = 0; $i < count($projects); $i++){
		$projects[$i]['photos'] = "http://lorempixel.com/400/250/";
		for ($j = 0; $j < count($projectPhotos); $j++){
			if ($projectPhotos[$j]['idproject'] == $projects[$i]['idproject']){

				$projects[$i]['photos'] = $app['upload_path'].'/'.$projectPhotos[$j]['photoUrl'];
				break;
			}
		}
	}

	for($i = 0; $i < count($workshops); $i++){
		$workshops[$i]['photos'] = "http://lorempixel.com/400/250/";
		for ($j = 0; $j < count($workshopPhotos); $j++){
			if ($workshopPhotos[$j]['idworkshop'] == $workshops[$i]['idworkshop']){
				$workshops[$i]['photos'] = $app['upload_path'].'/'.$workshopPhotos[$j]['photoUrl'];
				break;
			}
		}
	}



	$query = $app['db']->createQueryBuilder()
				->select("id, supportName, supportURL, supportLogo")
				->from('support');
	$supports = $app['db']->fetchAll($query);			

        $query = $app['db']->createQueryBuilder()
                                ->select("idmedia, mediaTitle, mediaUrl, mediaPhotoUrl")
                                ->from("media");
        $media = $app['db']->fetchAll($query);

        $query = $app['db']->createQueryBuilder()
            ->select("idcommittee, committeeName, committeeImage")
            ->from("committee");
        $committees = $app['db']->fetchAll($query);
        for ($i = 0; $i < count($committees); $i ++){
            $committees[$i]['committeeImage'] = "http://lorempixel.com/400/250/";
        }
     */
    return $app['twig']->render('index.html', array(
    		'projects' => $projects,
    		'workshops' => $workshops,
    		'supports' => $supports,
                'media' => $media,
                'committees' => $committees
    	));
});

$app->match('workshop/{id}', function($id) use ($app){

	$query = $app['db']->createQueryBuilder()
				->select("workshopName, workshopDate, workshopDescription")
				->from("workshop")
				->where("idworkshop = :idworkshop");

	$workshop = $app['db']->fetchAll($query, array( 'idworkshop'=>$id));

	$query = $app['db']->createQueryBuilder()
				->select("workshopLinkUrl, workshopLinkTitle")
				->from("workshop_link")
				->where("idworkshop = :idworkshop");
	$workshopLinks = $app['db']->fetchAll($query, array( 'idworkshop'=>$id));


	$query = $app['db']->createQueryBuilder()
				->select("idworkshop, photoName, photoDescription, photoUrl")
				->from("workshop_photo")
				->where("idworkshop = :idworkshop");
	$workshopPhotos = $app['db']->fetchAll($query, array( 'idworkshop'=>$id));

	return $app['twig']->render('workshop.html', array(
			'workshop' => $workshop[0],
			'workshopLinks' => $workshopLinks,
			'workshopPhotos' => $workshopPhotos,
	));
});


$app->match('project/{id}', function($id) use ($app){

	$query = $app['db']->createQueryBuilder()
				->select("projectName, projectDescription, projectHolder")
				->from("project")
				->where("idproject = :idproject");

	$project = $app['db']->fetchAll($query, array( 'idproject'=>$id));

	$query = $app['db']->createQueryBuilder()
				->select("projectLinkUrl, projectLinkTitle")
				->from("project_link")
				->where("idproject = :idproject");
	$projectLinks = $app['db']->fetchAll($query, array( 'idproject'=>$id));


	$query = $app['db']->createQueryBuilder()
				->select("idproject, photoName, photoDescription, photoUrl")
				->from("project_photo")
				->where("idproject = :idproject");
	$projectPhotos = $app['db']->fetchAll($query, array( 'idproject'=>$id));

	return $app['twig']->render('project.html', array(
			'project' => $project[0],
			'projectLinks' => $projectLinks,
			'projectPhotos' => $projectPhotos,
	));
});


$app->run();
?>
