<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");


    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);

});


$app->get('/api/adsurfaces', 'AdDimension\Controller\AdSurfaceController:fetch');
$app->get('/api/adsurfaces/{id}', 'AdDimension\Controller\AdSurfaceController:fetchOne');
$app->get('/api/adverts', 'AdDimension\Controller\AdvertController:fetch');
$app->get('/api/adverts/{id}', 'AdDimension\Controller\AdvertController:fetchOne');