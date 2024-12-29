<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Grupo de rutas con filtro de autenticación
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('customers/search', 'Customers::search');
    $routes->post('customers/rate', 'Customers::rate');
});

// Rutas públicas
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

// Redirección raíz
$routes->get('/', function() {
    if (session()->get('isLoggedIn')) {
        return redirect()->to('/customers/search');
    }
    return redirect()->to('/login');
});

return $routes;