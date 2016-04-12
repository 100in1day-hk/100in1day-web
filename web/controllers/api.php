<?php

$api_controller = $app['controllers_factory'];

$api_controller->get('/projects', function() use($app){
	$query = $app['db']->createQueryBuilder()
				->select("idproject, COALESCE(projectName, '') AS projectName, COALESCE(projectDescription, '') AS projectDescription, COALESCE(projectHolder, '') AS projectHolder")
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

	for($i = 0; $i < count($projects); $i++){
		$projects[$i]['photos'] = "http://lorempixel.com/400/250/";
		for ($j = 0; $j < count($projectPhotos); $j++){
			if ($projectPhotos[$j]['idproject'] == $projects[$i]['idproject']){
				$projects[$i]['photos'] = $app['upload_path'].'/'.$projectPhotos[$j]['photoUrl'];
				break;
			}
		}
                for ($j = 0; $j < count($projectLinks); $j++){
			if ($projectLinks[$j]['idproject'] == $projects[$i]['idproject']){
				$projects[$i]['photos'] = $projectLinks[$j];
			}
		}
	}

        return $app->json($projects);
});

$api_controller->get('/workshops', function() use ($app){
	$query = $app['db']->createQueryBuilder()
				->select("idworkshop, COALESCE(workshopName, '') AS workshopName, workshopDate, COALESCE(workshopDescription, '') AS workshopDescription")
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
	for($i = 0; $i < count($workshops); $i++){
		$workshops[$i]['photos'] = "http://lorempixel.com/400/250/";
		for ($j = 0; $j < count($workshopPhotos); $j++){
			if ($workshopPhotos[$j]['idworkshop'] == $workshops[$i]['idworkshop']){
				$workshops[$i]['photos'] = $app['upload_path'].'/'.$workshopPhotos[$j]['photoUrl'];
				break;
			}
                }
                for ($j = 0; $j < count($workshopLinks); $j++){
			if ($workshopLinks[$j]['idworkshop'] == $workshops[$i]['idworkshop']){
				$workshops[$i]['links'] = $workshopLinks[$j];
			}
		}
	}
        return $app->json($workshops);
});

$api_controller->get('/supports', function() use ($app){
	$query = $app['db']->createQueryBuilder()
				->select("id, supportName, supportURL, supportLogo")
				->from('support');
	$supports = $app['db']->fetchAll($query);			
        return $app->json($supports);
});
$api_controller->get('/media', function() use ($app){
        $query = $app['db']->createQueryBuilder()
                                ->select("idmedia, mediaTitle, mediaUrl, mediaPhotoUrl")
                                ->from("media");
        $media = $app['db']->fetchAll($query);
        return $app->json($media);
});
$api_controller->get('/committees', function() use ($app){
        $query = $app['db']->createQueryBuilder()
            ->select("idcommittee, committeeName, committeeImage")
            ->from("committee");
        $committees = $app['db']->fetchAll($query);
        return $app->json($committees);
});

$app->mount('/api', $api_controller);

?>
