<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'LoginController/login';
$route['logout'] = 'LoginController/logout';
$route['register_controller'] = 'RegisterController/register';
$route['home'] = 'HomeController/home_view';

//Client
$route['add_client'] = 'ClientController/register_view';
$route['add_dependent/(.*)'] = 'ClientController/register_dependent_view/$1';
$route['all_client'] = 'ClientController/all_client_view';
$route['all_payment'] = 'ClientController/all_payment_view';
$route['register_client'] = 'ClientController/add_client';
$route['register_client_dependent'] = 'ClientController/add_client_dependent';
$route['delete/(.*)'] = 'ClientController/delete_client/$1';
$route['delete_/(.*)'] = 'ClientController/delete_client_dependent/$1';
$route['update_client_page/(.*)'] = 'ClientController/update_client_view/$1';
$route['update'] = 'ClientController/update_client';
$route['update_dependent_page/(.*)'] = 'ClientController/update_client_dependent_view/$1';
$route['update_'] = 'ClientController/update_client_dependent';
$route['client_details/(.*)'] = 'ClientController/view_client_detail/$1';
$route['payment/(.*)'] = 'ClientController/pay_premium_view/$1';
$route['make_payment'] = 'ClientController/make_payment';
$route['view_payment/(.*)'] = 'ClientController/view_pay/$1';
//Staff
$route['add_consultant'] = 'StaffController/add_consultant_view';
$route['add_consultant_'] = 'StaffController/add_consultant';
$route['profile'] = 'StaffController/profile_view';
$route['profile_update'] = 'StaffController/Update_profile';
$route['login'] = 'LoginController/staff_validation';
$route['logout'] = 'LoginController/logout';
$route['reports'] = 'ReportController/reports';
$route['reports_'] = 'ReportController/reports_view_staff';
$route['location_report'] = 'ReportController/reports_view';







$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
