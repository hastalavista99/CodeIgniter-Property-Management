<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Dashboard;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('auth', 'Auth::index');
$routes->post('auth', 'Auth::loginUser');
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::loginUser');
$routes->get('logout', 'Auth::logout');
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('register', 'Auth::register');
    $routes->post('registerUser', 'Auth::registerUser');
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('landlords', 'Landlords::index');
    $routes->post('insertLandlord', 'Landlords::insertLandlord');
    $routes->get('tenants', 'Tenants::index');
    $routes->post('createTenant', 'Tenants::createTenant');
    $routes->get('assign', 'Tenants::assignPage');
    $routes->get('properties', 'Properties::index');
    $routes->get('units', 'Units::index');
    $routes->get('units', 'Units::index');
    $routes->get('unitSale', 'UnitSale::index');
    $routes->get('propertySale', 'PropertySale::index');
    $routes->get('accounts', 'Accounts::index');
    $routes->get('charts', 'Accounts::charts');
    $routes->get('approval', 'Accounts::approvalList');
    $routes->get('payment_report', 'Accounts::payments');
    $routes->get('tenant_report', 'Accounts::tenants');
    $routes->get('close_period', 'Accounts::close');
    $routes->get('users', 'Auth::users');
});
