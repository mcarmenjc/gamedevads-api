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
$app->get('/api/adsurfaces/{id}/advert', 'AdDimension\Controller\AdSurfaceController:findAdvert');
$app->get('/api/adverts', 'AdDimension\Controller\AdvertController:fetch');
$app->get('/api/adverts/{id}', 'AdDimension\Controller\AdvertController:fetchOne');
$app->post('/api/impressions','AdDimension\Controller\ImpressionController:post');
$app->get('/api/impressions/adverts/{id}','AdDimension\Controller\ImpressionController:fetchByAdvertId');
$app->get('/api/impressions/publishers/{id}','AdDimension\Controller\ImpressionController:fetchByPublisherId');
$app->post('/api/clicks','AdDimension\Controller\ClickController:post');
$app->get('/api/clicks/adverts/{id}','AdDimension\Controller\ClickController:fetchByAdvertId');
$app->get('/api/clicks/publishers/{id}','AdDimension\Controller\ClickController:fetchByPublisherId');

