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

    $this->db;
    //instantiate query class and get JSON with room type info back.

   //return JSON with room type info
   return $this->renderer->render($response, 'index.phtml', $args);
});
