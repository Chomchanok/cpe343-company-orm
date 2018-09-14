<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/employees', 'EmployeeController@all');
$router->get('/employees/{id}', 'EmployeeController@one');
$router->get('/employees/{id}/department', 'EmployeeController@department');
$router->get('/employees/{id}/job', 'EmployeeController@job');
$router->get('/employees/{id}/job-histories', 'EmployeeController@jobHistories');
$router->get('/employees/{id}/dependents', 'EmployeeController@dependents');
$router->get('/employees/{id}/supervisor', 'EmployeeController@supervisor');
$router->get('/employees/{id}/supervisees', 'EmployeeController@supervisees');
$router->get('/employees/{id}/manager', 'EmployeeController@manager');
$router->get('/employees/{id}/projects', 'EmployeeController@projects');

$router->get('/departments', 'DepartmentController@all');
$router->get('/departments/{id}', 'DepartmentController@one');
$router->get('/departments/{id}/employees', 'DepartmentController@employees');
$router->get('/departments/{id}/projects', 'DepartmentController@projects');
$router->get('/departments/{id}/locations', 'DepartmentController@locations');

$router->get('/projects', 'ProjectController@all');
$router->get('/projects/{id}', 'ProjectController@one');
$router->get('/projects/{id}/employees', 'ProjectController@employees');
$router->get('/projects/{id}/department', 'ProjectController@department');