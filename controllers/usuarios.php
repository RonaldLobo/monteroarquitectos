<?php

//require 'models/usuario.php'; //carga las librerias de composer
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/usuario.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$app->get('/usuarios/', function ($request,$response, $args) {
    $usuario = new Usuario(); 
    $newResponseHeader = $response->withHeader('Content-type', 'application/json');
    $newResponseStatus = $newResponseHeader->withStatus(200);
    $newResponseBody = $newResponseStatus->write($usuario->toJsonSeveral());
    return $newResponseBody;
});

$app->post('/usuarios/', function ($request,$response, $args) {
    $usuario = new Usuario(); 
    $newResponseHeader = $response->withHeader('Content-type', 'application/json');
    $newResponseStatus = $newResponseHeader->withStatus(200);
    $newResponseBody = $newResponseStatus->write($usuario->toJsonSeveral());
    return $newResponseBody;
});

$app->get('/usuarios/{name}', function ($request, $response, $args) {
    $response->write("aquiii, 2 " . $args['name']);
    return $response;
});


