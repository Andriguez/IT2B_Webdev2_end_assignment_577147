<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

date_default_timezone_set('UTC');

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the products endpoint
$router->get('/products', 'ProductController@getAll');
$router->get('/products/(\d+)', 'ProductController@getOne');
$router->post('/products', 'ProductController@create');
$router->put('/products/(\d+)', 'ProductController@update');
$router->delete('/products/(\d+)', 'ProductController@delete');

$router->get('/users', 'UserController@getAll');
$router->get('/users/(\d+)', 'UserController@getOne');
$router->post('/users', 'UserController@create');
$router->put('/users/(\d+)', 'UserController@update');
$router->delete('/users/(\d+)', 'UserController@delete');
$router->post('/users/login', 'UserController@login');



$router->get('/player/(\d+)', 'PlayerController@getOne');

$router->get('/quizzes', 'QuizController@getAll');
$router->get('/quizzes/(\d+)', 'QuizController@getOne');
$router->post('/quizzes', 'QuizController@create');
$router->put('/quizzes/(\d+)', 'QuizController@update');
$router->delete('/quizzes/(\d+)', 'QuizController@delete');

$router->get('/flags', 'FlagController@getAll');
$router->get('/flags/(\d+)', 'FlagController@getOne');
$router->post('/flags', 'FlagController@create');
$router->delete('/flags/(\d+)', 'FlagController@delete');

$router->get('/trial', 'TrialController@index');

$router->run();