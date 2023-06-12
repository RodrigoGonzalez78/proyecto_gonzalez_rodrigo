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
$routes->get('/about', 'Home::about');
$routes->get('/termsanduses', 'Home::termsanduses');



/*
Registro de usuarios
*/
$routes->get('/signup', 'SignUpController::create');
$routes->post('/register-user', 'SignUpController::formValidation');

//Login de usuario
$routes->get('/login', 'LoginController::index');
$routes->post('/login-user', 'LoginController::login');
$routes->get('/login-out', 'LoginController::logout');

//Crud Usuarios
$routes->get('/users', 'UserController::index',['filter'=> 'authAdmin']);
$routes->get('/edit-user', 'UserController::editUser',['filter'=> 'authAdmin']);

$routes->post('/update-user', 'UserController::updateUser',['filter'=> 'authAdmin']);

$routes->get('/disable-user', 'UserController::disableUser',['filter'=> 'authAdmin']);
$routes->get('/enable-user', 'UserController::enableUser',['filter'=> 'authAdmin']);
$routes->get('/password-bleaching', 'UserController::passwordBleaching',['filter'=> 'authAdmin']);

//Gestionar datos propios
$routes->get('/user-profile', 'ProfileController::userProfile',['filter'=> 'auth']);
$routes->post('/update-user-data', 'ProfileController::updateUser',['filter'=> 'auth']);
$routes->post('/update-address', 'ProfileController::updateAddress',['filter'=> 'auth']);
$routes->post('/update-password', 'ProfileController::updatePassword',['filter'=> 'auth']);

//Crud Productos
$routes->get('/products', 'ProductController::index');
$routes->get('/new-product', 'ProductController::newProduct',['filter'=> 'authAdmin']);
$routes->post('/store-product', 'ProductController::storeProduct',['filter'=> 'authAdmin']);

$routes->get('/edit-product', 'ProductController::editProduct',['filter'=> 'authAdmin']);
$routes->post('/update-product', 'ProductController::updateProduct',['filter'=> 'authAdmin']);

$routes->get('/disable-product', 'ProductController::disableProduct',['filter'=> 'authAdmin']);
$routes->get('/enable-product', 'ProductController::enableProduct',['filter'=> 'authAdmin']);

$routes->get('/disableds-products', 'ProductController::disabledProducts',['filter'=> 'authAdmin']);
$routes->post('/filter-products', 'ProductController::filterProducts');



//Carrito
$routes->get('/cart-list', 'CartController::index');
$routes->get('/add-cart', 'CartController::addCartProduct',['filter'=> 'auth']);
$routes->get('/clear-cart', 'CartController::clearCartProducts',['filter'=> 'auth']);

$routes->get('/sum-cart-element', 'CartController::addCountProductCart',['filter'=> 'auth']);
$routes->get('/rest-cart-element', 'CartController::restCountProductCart',['filter'=> 'auth']);

$routes->get('/remove-cart-element', 'CartController::removeProductCart',['filter'=> 'auth']);

$routes->get('/create-sale', 'CartController::createSale',['filter'=> 'auth']);

//Consultas
$routes->get('/contact', 'ConsultsController::index');
$routes->post('/create-consult', 'ConsultsController::createConsult');
$routes->get('/list-consults', 'ConsultsController::consultsList',['filter'=> 'authAdmin']);

$routes->get('/archived-list-consults', 'ConsultsController::archivedConsultsList',['filter'=> 'authAdmin']);

$routes->get('/archive-consult', 'ConsultsController::archiveConsult',['filter'=> 'authAdmin']);
$routes->get('/attended-consults', 'ConsultsController::attendedConsult',['filter'=> 'authAdmin']);


//Pedidos
$routes->get('/list-sales', 'SalesController::index',['filter'=> 'authAdmin']);
$routes->get('/list-sales-user', 'SalesController::userSales',['filter'=> 'auth']);
$routes->get('/bill', 'SalesController::bill',['filter'=> 'auth']);
$routes->get('/bill-dowload', 'SalesController::downloadBillPDF',['filter'=> 'auth']);
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
