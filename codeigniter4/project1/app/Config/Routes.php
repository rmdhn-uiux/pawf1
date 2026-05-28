<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('calculator', 'Calculator::index');
$routes->post('calculator/calculate', 'Calculator::calculate');
