<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

//route dashboard
$routes->get('/', 'DashboardController::index');

//route barang
$routes->resource('barang', ['controller' => 'BarangController']);
