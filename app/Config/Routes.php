<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/topic/(:num)', 'TopicPage::index/$1');
$routes->get('/signup', 'Auth::signupForm');
$routes->get('/login', 'Auth::loginForm');
$routes->post('/signup', 'Auth::register');
