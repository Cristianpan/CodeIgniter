<?php

namespace Config;

use App\Controllers\CtrlUsuariosTabla;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'CtrlUsuariosTabla::index');
$routes->get('/curp/(:alphanum)', 'CtrlUsuariosTabla::index/$1');
$routes->post('/cliente/eliminar', 'CtrlUsuariosTabla::eliminarCliente');
$routes->post('/cuenta/eliminar', 'CtrlUsuariosTabla::eliminarCuenta');  
$routes->post('/cuenta/agregar', 'CtrlUsuariosTabla::agregarCuenta');  

$routes->get('/registro', 'CtrlUsuariosRegistro::index');
$routes->post('/registro', 'CtrlUsuariosRegistro::registrar');
$routes->get('/editar/(:any)', 'CtrlUsuariosRegistro::index/$1'); 
$routes->post('/editar/(:num)/(:alphanum)', 'CtrlUsuariosRegistro::editar/$1/$2'); 


$routes->get('/reporte', 'CtrlUsuariosReporte::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
