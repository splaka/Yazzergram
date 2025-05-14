<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/topic/(:num)', 'TopicPage::index/$1');
$routes->get('/signup', 'Auth::index');
$routes->post('/signup', 'Auth::register');
