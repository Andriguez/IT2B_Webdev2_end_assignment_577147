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
$router->get('/users/(\d+)', 'UserController@getUsersByType');
$router->get('/user/(\d+)', 'UserController@getOne');
$router->post('/user', 'UserController@create');
$router->put('/user/(\d+)', 'UserController@update');
$router->delete('/user/(\d+)', 'UserController@delete');
$router->post('/users/login', 'UserController@login');





$router->get('/player/(\d+)', 'PlayerController@getOne');
$router->get('/player/(\d+)/history', 'PlayerController@getPlayerHistory');
$router->get('/player/(\d+/favorites)', 'PlayerController@getPlayerFavorites');



$router->get('/quizzes', 'QuizController@getAll');
$router->get('/quizzes/(\d+)', 'QuizController@getQuizzesByTopic');

$router->get('/quizzes/topics', 'QuizController@getAllTopics');
$router->get('/quizzes/topics/(\d+)', 'QuizController@getTopic');
$router->post('/quizzes/topics', 'QuizController@createTopic');
$router->put('/quizzes/topics/(\d+)', 'QuizController@editTopic');


$router->get('/quizzes/levels', 'QuizController@getAllLevels');
$router->get('/quizzes/levels/(\d+)', 'QuizController@getLevel');

$router->post('/quizzes', 'QuizController@create');
$router->put('/quizzes/(\d+)', 'QuizController@update');
$router->delete('/quizzes/(\d+)', 'QuizController@delete');

$router->get('/flags', 'FlagController@getAll');
$router->get('/flags/(\d+)', 'FlagController@getFlagsByFilter');
$router->get('/flags/(\d+)', 'FlagController@getFlagsByFilter');

$router->get('/flag/(\d+)', 'FlagController@getOne');
$router->post('/flag', 'FlagController@create');
$router->delete('/flag/(\d+)', 'FlagController@delete');

$router->get('/trial', 'TrialController@index');

$router->run();