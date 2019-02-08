<?php

$routes = new Router;

$routes->get('/abonnes',            'AbonnesController@index');
$routes->get('/abonnes/(\d+)',      'AbonnesController@show');
$routes->get('/abonnes/add',        'AbonnesController@add');
$routes->post('/abonnes/save',       'AbonnesController@save');
$routes->get('/abonnes/(\d+)/edit', 'AbonnesController@edit');
$routes->get('/abonnes/(\d+)/delete','AbonnesController@delete');

$routes->get('/ouvrages',            'OuvragesController@index');
$routes->get('/ouvrages/(\d+)',      'OuvragesController@show');
$routes->get('/ouvrages/add',        'OuvragesController@add');
$routes->post('/ouvrages/save',       'OuvragesController@save');
$routes->get('/ouvrages/(\d+)/edit', 'OuvragesController@edit');
$routes->get('/ouvrages/(\d+)/delete','OuvragesController@delete');

$routes->get('/emprunts',            'EmpruntsController@index');
$routes->get('/emprunts/add',        'EmpruntsController@add');
$routes->post('/emprunts/save',       'EmpruntsController@save');
$routes->get('/emprunts/(\d+)/delete','EmpruntsController@delete');

$routes->get('/',  'PagesController@home');

$routes->run();