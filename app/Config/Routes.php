<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/topic/(:num)', 'TopicPage::index/$1');
$routes->get('/signup', 'Auth::signupForm');
$routes->get('/login', 'Auth::loginForm');
$routes->post('/login', 'Auth::login');
$routes->post('/signup', 'Auth::register');
$routes->get('/logout', 'Auth::logout');
// Gruppe per le rotte che richiedono l'utente loggato
$routes->group('', ['filter' => 'logincheck'], function ($routes) {
    $routes->post('/topic/(:num)', 'TopicPage::newPost/$1');
    $routes->get('/topic/creaTopic', 'Home::newTopicForm');
    $routes->post('/topic/creaTopic', 'Home::newTopic');
    $routes->get('/profilo', 'Auth::profile');
    $routes->get('/eliminaProfilo', 'Auth::deleteAccount');
    $routes->post('/post/delete/(:num)', 'TopicPage::deletePost/$1');
    $routes->post('/topic/delete/(:num)', 'Home::deleteTopic/$1');
    $routes->get('/profilo/edit', 'Auth::updateProfileForm');
    $routes->post('/profilo/edit', 'Auth::updateProfile');
});
