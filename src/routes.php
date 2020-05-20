<?php

use Slim\Http\Request;
use Slim\Http\Response;

//Routes

$app->get('/', function($request, $response, $args)
{
  $endpoints = [
    'all tasks' => $this->api['api_url'] . '/tasktodo',
    'single task' => $this->api['api_url'] . '/tasktodo/{task_id}',
  ];

  $result = [
     'endpoints' => $endpoints,
     'version' => $this->api['version'],
     'timestamp' => time(),
   ];
   return $response->withJson($result, 200, JSON_PRETTY_PRINT);

});

$app->group('/api/v1/tasktodo', function() use($app) {

  $app->get('', function ($request, $response, $args) {
  $result = $this->task->getTasks();
  return $response->withJson($result, 200, JSON_PRETTY_PRINT);
  });

});
