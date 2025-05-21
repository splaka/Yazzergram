<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/topic/(:num)', 'TopicPage::index/$1');
$routes->get('/signup', 'Auth::signupForm');
$routes->get('/login', 'Auth::loginForm');
$routes->get('/logout', 'Auth::logout');
$routes->post('/login', 'Auth::login');
$routes->post('/signup', 'Auth::register');
