<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\GuestbookController;

$routes->get('/',[GuestbookController::class,'index']);
$routes->get('/new',[GuestbookController::class,'new']);
$routes->post('/records', [GuestbookController::class, 'create']);
$routes->post('/edit',[GuestbookController::class,'edit']);
$routes->get('/edit/(:any)',[GuestbookController::class,'view/$1']);
$routes->add('/delete/(:any)',[GuestbookController::class,'delete/$1']);
