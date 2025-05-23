<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/topic/(:num)', 'TopicPage::index/$1');
$routes->post('/topic/(:num)', 'TopicPage::newPost/$1');
$routes->get('/topic/creaTopic', 'Home::newTopicForm');
$routes->post('/topic/creaTopic', 'Home::newTopic');
$routes->get('/signup', 'Auth::signupForm');
$routes->get('/login', 'Auth::loginForm');
$routes->get('/logout', 'Auth::logout');
$routes->post('/login', 'Auth::login');
$routes->post('/signup', 'Auth::register');
$routes->get('/profilo', 'Auth::profile');
$routes->get('/eliminaProfilo', 'Auth::deleteAccount');