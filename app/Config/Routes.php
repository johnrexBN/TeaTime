<?php

namespace Config;

use App\Controllers\admin;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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

//Login User
$routes->get('/login', 'Auth::login');
$routes->get('/', 'welcome::index');
$routes->get('/Auth', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->post('/save', 'Auth::save');
$routes->post('/check', 'Auth::check');
$routes->post('/verifyOtp', 'Auth::verifyOtp');
$routes->get('/dashboard', 'Auth::dashboard');
$routes->match(['get','post'],'/fpass', 'Auth::fpass');
$routes->match(['get','post'],'/otp', 'Auth::otp');
$routes->match(['get','post'],'/reset', 'Auth::reset');
$routes->match(['get','post'],'/logout', 'Auth::logout');

// $routes->group('',['filter' => 'Authguard'], function($routes){

//Admin Side
$routes->get('/index', 'admin::index');
$routes->get('/products', 'admin::products');
$routes->post('/savemenu', 'admin::savemenu');
$routes->get('/menu', 'admin::menu');
$routes->post('/addmenu', 'admin::addmenu');
$routes->get('/addmenu', 'admin::addmenu');
$routes->get('/addproducts', 'admin::addproducts');
$routes->post('/addproducts', 'admin::addproducts');
$routes->post('/saveproduct', 'admin::saveproduct');
$routes->get('/edit/(:any)', 'admin::edit/$1');
$routes->put('/update/(:any)', 'admin::update/$1');
$routes->get('/delete/(:any)', 'admin::delete/$1');
$routes->get('/stockcount', 'admin::stockcount');
$routes->put('/updatemenu/(:any)', 'admin::updatemenu/$1');
$routes->get('/editmenu/(:any)', 'admin::editmenu/$1');
$routes->get('/inbox', 'admin::inbox');
$routes->get('/contactus', 'admin::contactus');
$routes->get('/orders', 'admin::orders');
$routes->post('/orders', 'admin::orders');
$routes->get('/accept/(:any)', 'admin::accept/$1');
$routes->get('/accept_book/(:any)', 'admin::accept_book/$1');
$routes->get('/decline_book/(:any)', 'admin::decline_book/$1');
$routes->get('/contact_accept/(:any)', 'admin::contact_accept/$1');
$routes->get('/decline_order/(:any)', 'admin::decline_order/$1');
$routes->post('/transactions', 'admin::transactions');
$routes->get('/transactions', 'admin::transactions');
$routes->match(['get','post'],'/pick_up/(:any)', 'admin::pick_up/$1');

//Homepage
$routes->get('/homepage', 'home::homepage');
$routes->match(['get','post'],'/contact', 'home::contact');
$routes->match(['get','post'],'/save_contact', 'home::save_contact');
$routes->get('/about', 'home::about');
$routes->match(['get','post'],'/book', 'home::book');
$routes->match(['get','post'],'/save_reservation', 'home::save_reservation');
$routes->match(['get','post'],'/checkout', 'home::checkout');
$routes->get('/shop', 'home::shop');
$routes->get('/single_product/(:any)', 'home::single_product/$1');
$routes->get('/addtocart', 'home::addtocart');
$routes->post('/try', 'home::try');
$routes->get('/cart/(:any)', 'home::cart/$1');
$routes->post('/userCart', 'home::userCart');
$routes->get('/cart', 'home::cart');
$routes->get('/delete_cart/(:any)', 'home::delete_cart/$1');
$routes->post('/placeorder', 'home::place_order');
$routes->get('/placeorder', 'home::place_order');
$routes->post('/search', 'home::search');
$routes->get('/search', 'home::search');




//User Profile
$routes->match(['get','post'],'/profile/(:any)', 'User::profile/$1');
$routes->put('/update_profile/(:any)', 'User::update_profile/$1');
$routes->get('/profile', 'User::profile');
$routes->get('/editprofile', 'User::editprofile');
$routes->get('/show', 'User::show');
$routes->get('/order_history', 'User::order_history');
$routes->get('/order_status', 'User::order_status');
$routes->match(['get','post'],'/cancel_order/(:any)', 'User::cancel_order/$1');

// });

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
