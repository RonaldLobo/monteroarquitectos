<?php

//require '../vendor/autoload.php'; //carga las librerias de composer

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
//use vendor\psr\http-message\ServerRequestInterface;
//use vendor\psr\http-message\ResponseInterface;

$app = new Slim\App(); //instancia de slim
//$app = new \Slim\App;

//require '../controllers/usuarios.php'; //carga las librerias de composer
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/usuarios.php';

//se definen las rutas
$app->get('/', function ($request, $response, $args) {
    $response->write("Welcome to Slim here  !");
    return $response;
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
});


//se ejecuta al final un run para que corra slim
$app->run();
