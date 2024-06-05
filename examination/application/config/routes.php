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
$route['special_exam_result_user/(:any)'] = 'pages/special_exam_result_user/$1';
$route['aptitude_exam_result_user/(:any)'] = 'pages/aptitude_exam_result_user/$1';
$route['submit_exam_special'] = 'pages/submit_exam_special';
$route['it_exam_start'] = 'pages/it_exam_start';
$route['respiratory_exam_start'] = 'pages/respiratory_exam_start';
$route['radiology_exam_start'] = 'pages/radiology_exam_start';
$route['pharmacy_exam_start'] = 'pages/pharmacy_exam_start';
$route['physical_theraphy_exam_start'] = 'pages/physical_theraphy_exam_start';
$route['laboratory_exam_start'] = 'pages/laboratory_exam_start';
$route['nursing_exam_start'] = 'pages/nursing_exam_start';
$route['specialization_exam/(:any)'] = 'pages/specialization_exam/$1';
$route['submit_exam_aptitude'] = 'pages/submit_exam_aptitude';
$route['aptitude_test_5_start'] = 'pages/aptitude_test_5_start';
$route['aptitude_test_5'] = 'pages/aptitude_test_5';
$route['aptitude_test_4_start'] = 'pages/aptitude_test_4_start';
$route['aptitude_test_4'] = 'pages/aptitude_test_4';
$route['aptitude_test_3_start'] = 'pages/aptitude_test_3_start';
$route['aptitude_test_3'] = 'pages/aptitude_test_3';
$route['aptitude_test_2_start'] = 'pages/aptitude_test_2_start';
$route['aptitude_test_2'] = 'pages/aptitude_test_2';
$route['aptitude_test_1_start'] = 'pages/aptitude_test_1_start';
$route['aptitude_test_1'] = 'pages/aptitude_test_1';
$route['aptitude_exam'] = 'pages/aptitude_exam';
$route['save_exam_details'] = 'pages/save_exam_details';
$route['delete_employment/(:any)'] = 'pages/delete_employment/$1';
$route['save_employment'] = 'pages/save_employment';
$route['previous_employment'] = 'pages/previous_employment';
$route['delete_organization/(:any)'] = 'pages/delete_organization/$1';
$route['save_organization'] = 'pages/save_organization';
$route['professional_organization'] = 'pages/professional_organization';
$route['delete_training/(:any)'] = 'pages/delete_training/$1';
$route['save_training'] = 'pages/save_training';
$route['training_certification'] = 'pages/training_certification';
$route['save_graduate_school'] = 'pages/save_graduate_school';
$route['graduate_school'] = 'pages/graduate_school';
$route['save_education'] = 'pages/save_education';
$route['educational_background'] = 'pages/educational_background';
$route['save_profile'] = 'pages/save_profile';
$route['personal_background'] = 'pages/personal_background';
$route['register'] = 'pages/register';
$route['logout'] = 'pages/logout';
$route['main'] = 'pages/main';
$route['login'] = 'pages/login';
$route['delete_exam_pt/(:any)'] = 'pages/delete_exam_pt/$1';
$route['save_pt'] ='pages/save_pt';
$route['exam_pt'] ='pages/exam_pt';
$route['delete_exam_mtc/(:any)'] = 'pages/delete_exam_mtc/$1';
$route['save_mtc'] ='pages/save_mtc';
$route['exam_mtc'] ='pages/exam_mtc';
$route['delete_exam_mtq/(:any)'] = 'pages/delete_exam_mtq/$1';
$route['save_mtq'] ='pages/save_mtq';
$route['exam_mtq'] ='pages/exam_mtq';
$route['delete_exam_essay/(:any)'] = 'pages/delete_exam_essay/$1';
$route['save_essay'] ='pages/save_essay';
$route['exam_essay'] ='pages/exam_essay';
$route['delete_exam_fb/(:any)'] = 'pages/delete_exam_fb/$1';
$route['save_fb'] ='pages/save_fb';
$route['exam_fb'] ='pages/exam_fb';
$route['delete_exam_tof/(:any)'] = 'pages/delete_exam_tof/$1';
$route['save_tof'] ='pages/save_tof';
$route['exam_tof'] ='pages/exam_tof';
$route['delete_exam_mc/(:any)'] = 'pages/delete_exam_mc/$1';
$route['save_specialization'] ='pages/save_specialization';
$route['exam_mc'] ='pages/exam_mc';
$route['delete_exam_aptitude/(:any)'] = 'pages/delete_exam_aptitude/$1';
$route['save_aptitude'] ='pages/save_aptitude';
$route['exam_aptitude'] ='pages/exam_aptitude';
$route['special_exam_result/(:any)'] = 'pages/special_exam_result/$1';
$route['aptitude_exam_result/(:any)'] = 'pages/aptitude_exam_result/$1';
$route['view_exam_summary/(:any)'] = 'pages/view_exam_summary/$1';
$route['app_exam'] = 'pages/app_exam';
$route['print_pds/(:any)'] = 'pages/print_pds/$1';
$route['app_pds'] = 'pages/app_pds';
$route['admin_logout'] = 'pages/admin_logout';
$route['admin_main'] = 'pages/admin_main';
$route['admin_login'] = 'pages/admin_login';
$route['admin'] = 'pages/admin_view';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
