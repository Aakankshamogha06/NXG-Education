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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';

// setting route for admin
$route['admin'] = 'admin/auth';

$route['admin/dashboard2'] = 'admin/dashboard/index2';

$route['material-dashboard-master'] = 'admin/auth';
$route['material-dashboard-master/(:any)'] = 'admin/material-dashboard-master/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Admin Panel

// Users
$route['users/add_users'] = 'admin/users/add_users';
$route['users/users_submit_data'] = 'admin/users/users_submit_data';
$route['users/view_users']        = 'admin/users/users_view';
$route['users/edit_users/(:any)'] = 'admin/users/users_edit/$1';
$route['users/users_update_data'] = 'admin/users/users_update_data';
$route['users/users_delete/(:any)'] = 'admin/users/users_delete/$1';

// //Technical_analysis
// $route['technical_analysis/add_technical_analysis'] = 'admin/technical_analysis/add_technical_analysis';
// $route['technical_analysis/technical_analysis_submit_data'] = 'admin/technical_analysis/technical_analysis_submit_data';
// $route['technical_analysis/view_technical_analysis']        = 'admin/technical_analysis/technical_analysis_view';
// $route['technical_analysis/edit_technical_analysis/(:any)'] = 'admin/technical_analysis/technical_analysis_edit/$1';
// $route['technical_analysis/technical_analysis_update_data'] = 'admin/technical_analysis/technical_analysis_update_data';
// $route['technical_analysis/technical_analysis_delete/(:any)'] = 'admin/technical_analysis/technical_analysis_delete/$1';