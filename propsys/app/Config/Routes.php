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
$routes->get('auth/login', 'Auth::index');
$routes->post('login', 'Auth::loginUser');
$routes->get('logout', 'Auth::logout');
$routes->get('auth/enterUsername', 'Auth::enterUsername');
$routes->post('auth/verify', 'Auth::verifyUser');
$routes->post('auth/renew_auth', 'Auth::renewAuth');
$routes->get('auth/otp', 'Auth::otpInput');
$routes->post('auth/verified', 'Auth::renew');
$routes->get('auth/success', 'Auth::success');
$routes->get('auth/tenant', 'Auth::tenantLogin');
$routes->get('auth/password/success', 'Auth::success');
$routes->post('auth/tenant/signin', 'Auth::tenantSignIn');
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('register', 'Auth::register');
    $routes->post('registerUser', 'Auth::registerUser');
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('landlords', 'Landlords::index');
    $routes->post('insertLandlord', 'Landlords::insertLandlord');
    $routes->get('viewLandlord', 'Landlords::show');
    $routes->get('rent/tenants', 'Tenants::index');
    $routes->post('createTenant', 'Tenants::createTenant');
    $routes->get('assign', 'AssignTenant::index');
    $routes->post('assignTenant', 'AssignTenant::assign');
    $routes->post('assignTenant/getUnits', 'AssignTenant::getUnits');
    $routes->post('assignTenant/getTenants', 'AssignTenant::getTenants');
    $routes->post('assignTenant/getRent', 'AssignTenant::getRent');
    $routes->get('vacate', 'AssignTenant::vacate');
    $routes->post('vacateTenant', 'AssignTenant::vacateTenant');
    $routes->get('viewTenant', 'Tenants::viewTenant');
    $routes->post('editTenant', 'Tenants::editTenant');
    $routes->get('deleteTenant', 'Tenants::deleteTenant');
    $routes->get('rent/properties', 'Properties::index');
    $routes->get('rent/my_properties', 'Properties::myPropertiesRent');
    $routes->get('sale/my_properties', 'Properties::myPropertiesSale');
    $routes->get('rent/my_tenants', 'Tenants::myTenants');
    $routes->get('propertyShow', 'Properties::show');
    $routes->post('insertProperty', 'Properties::insertProperty');
    $routes->get('rent/units', 'Units::index');
    $routes->get('rent/units/bills', 'Units::billPage');
    $routes->post('rent/units/bills/set', 'Units::setBills');
    $routes->post('insertUnit', 'Units::insertUnit');
    $routes->get('viewUnit', 'Units::view');
    $routes->post('propertySale', 'PropertySale::propertySale');
    $routes->get('saleShow', 'PropertySale::showSale');
    $routes->get('sale/units', 'UnitSale::index');
    $routes->post('saleUnit', 'UnitSale::saleUnit');
    $routes->get('sale/properties', 'PropertySale::index');
    $routes->get('accounts', 'Accounts::index');
    $routes->get('charts', 'Accounts::charts');
    $routes->get('accounts/paypesa', 'Payments::paybill');
    $routes->get('accounts/approval', 'Accounts::approvalList');
    $routes->get('rent_approval', 'Accounts::rentApprove');
    $routes->get('payment_report', 'Accounts::payments');
    $routes->get('tenant_report', 'Accounts::tenants');
    $routes->get('close_period', 'Accounts::close');
    $routes->get('users', 'Auth::users');
    $routes->get('profile', 'Auth::profile');
    $routes->get('tenant/profile', 'Auth::tenantProfile');
    $routes->get('rentPay', 'Payments::index');
    $routes->post('rentReceive', 'Payments::rentReceive');
    $routes->get('noData', 'Dashboard::noData');
    $routes->get('users/edit', 'Auth::edit');
    $routes->post('users/update', 'Auth::updateUser');
    $routes->post('auth/password/change', 'Auth::changeAuth');
    $routes->post('auth/tenant/password/change', 'Auth::changeTenantAuth');
    $routes->get('auth/tenant/logout', 'Auth::tenantLogout');
    
});
