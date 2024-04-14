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

$router->get('/users', 'UserController@getAll');
$router->get('/users/(\d+)', 'UserController@getUsersByType');
$router->get('/user/(\d+)', 'UserController@getOne');
$router->post('/user', 'UserController@create');
$router->put('/user/(\d+)', 'userController@editUser');
$router->delete('/user/(\d+)', 'UserController@deleteUser');
$router->post('/users/login', 'UserController@login');
$router->post('/users/register', 'UserController@register');
$router->patch('/resetpwd/(\d+)', 'UserController@resetPassword');

$router->get('/users/types', 'UserController@getUsertypes');

$router->get('/player/(\d+)', 'PlayerController@getOne');
$router->get('/player/(\d+)/history', 'PlayerController@getPlayerHistory');
$router->get('/player/(\d+/favorites)', 'PlayerController@getPlayerFavorites');

$router->get('/quizzes', 'QuizController@getAll');
$router->get('/quizzes/(\d+)', 'QuizController@getQuizzesByTopic');

$router->get('/quiz/(\d+)', 'QuizController@getQuiz');
$router->post('/quiz/new', 'QuizController@createQuiz');
$router->post('/quiz/questions/(\d+)', 'QuizController@AddNewQuestion');
$router->put('/quiz/(\d+)', 'QuizController@editQuiz');
$router->put('/quiz/questions/(\d+)', 'QuizController@editQuestion');
$router->put('/quiz/answers/(\d+)', 'QuizController@editAnswer');
$router->delete('/quiz/(\d+)', 'QuizController@deleteQuiz');

$router->get('/quizzes/topics', 'QuizController@getAllTopics');
$router->get('/quizzes/topics/(\d+)', 'QuizController@getTopic');
$router->post('/quizzes/topics', 'QuizController@createTopic');
$router->put('/quizzes/topics/(\d+)', 'QuizController@editTopic');
$router->delete('/quizzes/topics/(\d+)', 'QuizController@deleteTopic');


$router->get('/quizzes/levels', 'QuizController@getAllLevels');
$router->get('/quizzes/levels/(\d+)', 'QuizController@getLevel');
$router->post('/quizzes/levels', 'QuizController@createLevel');
$router->put('/quizzes/levels/(\d+)', 'QuizController@editLevel');
$router->delete('/quizzes/levels/(\d+)', 'QuizController@deleteLevel');


$router->post('/quizzes', 'QuizController@create');
$router->put('/quizzes/(\d+)', 'QuizController@update');
$router->delete('/quizzes/(\d+)', 'QuizController@delete');

$router->get('/flags', 'FlagController@getAll');
$router->get('/flags/(\d+)', 'FlagController@getFlagsByFilter');
$router->get('/flags/(\d+)', 'FlagController@getFlagsByFilter');

$router->get('/flag/(\d+)', 'FlagController@getOne');
$router->post('/flag', 'FlagController@create');
$router->put('/flag/(\d+)', 'FlagController@editFlagStatus');
$router->delete('/flag/(\d+)', 'FlagController@delete');

$router->get('/trial', 'TrialController@index');

$router->run();