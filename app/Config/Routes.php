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

$routes->get('/', 'Home::index');
$routes->get('/contact', 'Home::contact');
$routes->get('/about', 'Home::about');
$routes->get('/termsanduses', 'Home::termsanduses');



//Registro de usuario
$routes->get('/signup', 'SignUpController::create');
$routes->post('/register-user', 'SignUpController::formValidation');

//Login de usuario
$routes->get('/login', 'LoginController::index');
$routes->post('/login-user', 'LoginController::login');
$routes->get('/login-out', 'LoginController::logout');

//Crud Usuarios
$routes->get('/users', 'UserController::index');
$routes->get('/edit-user', 'UserController::editUser');

$routes->post('/update-user', 'UserController::updateUser');

$routes->get('/disable-user', 'UserController::disableUser');
$routes->get('/enable-user', 'UserController::enableUser');

//Crud Productos
$routes->get('/products', 'ProductController::index');
$routes->get('/new-product', 'ProductController::newProduct');
$routes->post('/store-product', 'ProductController::storeProduct');

$routes->get('/edit-product', 'ProductController::editProduct');
$routes->post('/update-product', 'ProductController::updateProduct');

$routes->get('/disable-product', 'ProductController::disableProduct');
$routes->get('/enable-product', 'ProductController::enableProduct');

$routes->get('/disableds-products', 'ProductController::disabledProducts');
$routes->post('/filter-products', 'ProductController::filterProducts');



//Carrito
$routes->get('/cart-list', 'CartController::index');
$routes->get('/add-cart', 'CartController::addCartProduct');
$routes->get('/clear-cart', 'CartController::clearCartProducts');
$routes->get('/sum-cart-element', 'CartController::addCountProductCart');

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
