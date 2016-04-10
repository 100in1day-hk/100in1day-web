<?php

$api_controller = $app['controllers_factory'];

$api_controller->get('/projects', function() use($app){
	$query = $app['db']->createQueryBuilder()
				->select("idproject, projectName, projectDescription, projectHolder")
				->from("project");

	$projects = $app['db']->fetchAll($query);

        return $app->json($projects);
});

$api_controller->get('/projectLinks', function() use ($app){
	$query = $app['db']->createQueryBuilder()
				->select("idproject, projectLinkUrl, projectLinkTitle")
				->from("project_link");

	$projectLinks = $app['db']->fetchAll($query);
        return $app->json($projectLinks);
});
$api_controller->get('/projectPhotos', function() use ($app){
	$query = $app['db']->createQueryBuilder()
				->select("idproject, photoName, photoDescription, photoUrl")
				->from("project_photo");

	$projectPhotos = $app['db']->fetchAll($query);
        return $app->json($projectPhotos);
});
$api_controller->get('/workshops', function() use ($app){
	$query = $app['db']->createQueryBuilder()
				->select("idworkshop, workshopName, workshopDate, workshopDescription")
				->from("workshop");

	$workshops = $app['db']->fetchAll($query);
        return $app->json($workshops);
});
$api_controller->get('/workshopsLinks', function() use ($app){
	$query = $app['db']->createQueryBuilder()
				->select("workshopLinkUrl, workshopLinkTitle")
				->from("workshop_link");
	$workshopLinks = $app['db']->fetchAll($query);
        return $app->json($workshopLinks);
});
$api_controller->get('/workshopPhtots', function() use ($app){
	$query = $app['db']->createQueryBuilder()
				->select("idworkshop, photoName, photoDescription, photoUrl")
				->from("workshop_photo");
	$workshopPhotos = $app['db']->fetchAll($query);
        return $app->json($workshopPhotos);
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
