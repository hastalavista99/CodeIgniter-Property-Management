<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Dashboard;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('landlords', 'Landlords::index');
$routes->get('tenants', 'Tenants::index');
$routes->get('properties', 'Properties::index');
$routes->get('units', 'Units::index');
$routes->get('units', 'Units::index');
$routes->get('unitSale', 'UnitSale::index');
$routes->get('propertySale', 'PropertySale::index');
$routes->get('accounts', 'Accounts::index');
$routes->get('charts', 'Accounts::charts');
$routes->get('approval', 'Accounts::approvalList');
