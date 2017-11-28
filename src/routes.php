<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function(Request $request, Response $response, array $args) {
    $this->logger->info("Request to display page");

    //Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->get('/rooms', function (Request $request, Response $response, array $args) {
    $this->logger->info("Getting room types info");

    $roomTypeGenerator = new \App\Classes\ModelMethods\RoomImageGenerator($this->db, $this->logger);
    $data = $roomTypeGenerator->getImagesForRoomType(1);
    var_dump($data);
//    $response = $response->withAddedHeader('Access-Control-Allow-Origin', '*');
//    return $response->withJson($data, 200);
});