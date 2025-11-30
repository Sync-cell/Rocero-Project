<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login'); // Set login as default

// Task Manager routes
$routes->get('/tasks', 'TaskController::index');
$routes->get('task/create', 'TaskController::create');
$routes->post('task/store', 'TaskController::store');
$routes->get('task/edit/(:num)', 'TaskController::edit/$1');
$routes->post('task/update/(:num)', 'TaskController::update/$1');
$routes->get('task/delete/(:num)', 'TaskController::delete/$1');
$routes->post('upload', 'UploadController::upload');


// Authentication routes
$routes->get('/admin/login', 'Auth::login');
$routes->get('/admin/register', 'Auth::register');
$routes->post('/admin/store', 'Auth::store');
$routes->post('/admin/authenticate', 'Auth::authenticate');
$routes->get('/admin/logout', 'Auth::logout');  // Add this route for logout
$routes->post('/upload', 'FileController::upload');


// Optional: a protected dashboard (if you use it)
$routes->get('dashboard', 'Dashboard::index');

// ✅ RESTful API routes (Step 3)
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->get('tasks', 'TaskApiController::index');           // GET /api/tasks
    $routes->get('tasks/(:num)', 'TaskApiController::show/$1');  // GET /api/tasks/{id}
    $routes->post('tasks', 'TaskApiController::create');         // POST /api/tasks
    $routes->put('tasks/(:num)', 'TaskApiController::update/$1'); // PUT /api/tasks/{id}
    $routes->delete('tasks/(:num)', 'TaskApiController::delete/$1'); // DELETE /api/tasks/{id}
});








