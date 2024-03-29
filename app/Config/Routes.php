<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
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

//Home
$routes->get('/dashboard', 'Pages::index');
$routes->get('/', 'Pages::index');

// For manual auth

// $routes->get('/', 'Auth::index');
// $routes->post('/login', 'Auth::check');
// $routes->get('/logout', 'Auth::delete');

//HTTP Spoofing Method
$routes->delete('item/delete/(:num)', 'Pages::delete/$1', ['filter' => 'role:admin']);
$routes->delete('po/delete/(:num)', 'Orders::deletePo/$1', ['filter' => 'role:admin']);
$routes->delete('do/delete/(:num)', 'Orders::deleteDo/$1', ['filter' => 'role:admin']);

//Items
$routes->get('about/', 'Pages::about');
$routes->get('about/(:any)', 'Pages::detail/$1');
$routes->get('item/create', 'Pages::create');
$routes->get('item/edit/(:num)', 'Pages::edit/$1', ['filter' => 'role:admin']);
$routes->post('item/update/(:num)', 'Pages::update/$1', ['filter' => 'role:admin']);
$routes->post('item/save', 'Pages::save');

//Purchase Orders
$routes->get('po/', 'Orders::index');
$routes->get('po/create', 'Orders::createPo');
$routes->post('po/save', 'Orders::savePo');
$routes->get('detailpo/(:any)', 'Orders::detailPo/$1');
$routes->get('po/edit/(:num)', 'Orders::editPo/$1', ['filter' => 'role:admin']);
$routes->post('po/update/(:num)', 'Orders::updatePo/$1', ['filter' => 'role:admin']);

//Mutation Orders
$routes->get('do/', 'Orders::deliv_order');
$routes->get('do/create', 'Orders::createDo');
$routes->post('do/save', 'Orders::saveDo');
$routes->get('detaildo/(:any)', 'Orders::detailDo/$1');
$routes->get('do/edit/(:num)', 'Orders::editDo/$1', ['filter' => 'role:admin']);
$routes->post('do/update/(:num)', 'Orders::updateDo/$1', ['filter' => 'role:admin']);

//User
$routes->get('admin/', 'Users::index', ['filter' => 'role:admin']);
$routes->get('admin/create', 'Users::createUser', ['filter' => 'role:admin']);
$routes->post('admin/update/(:num)', 'Users::update/$1', ['filter' => 'role:admin']);
$routes->get('profile/', 'Users::profile');
$routes->get('admin/(:num)', 'Users::detail/$1', ['filter' => 'role:admin']);
$routes->post('changePassword/', 'Users::changePasswordUser');

// Nota

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
