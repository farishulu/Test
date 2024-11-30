<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/film', 'Api::GenreFilm');
$routes->get('film/genre', 'Api::findGenre');
$routes->get('/tanggalWaktu', 'Api::tampilkanTanggalWaktu');
$routes->get('/menyapa', 'Api::Menyapa');

$routes->post('/hitungLuas', 'Api::hitungLuas');
$routes->post('/pesan', 'Api::simpanPesan');


$routes->post('/main', 'Test::main');





