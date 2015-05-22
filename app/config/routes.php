<?php  if ( ! defined('BASEPATH')) exit('No Access');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "arch";
$route['feed'] = 'arch/feed';
$route['page'] = 'arch/page';
$route['page/(\d{1,4})'] = 'arch/page/$1';
$route['search'] = 'arch/search';
$route['search/(:any)'] = 'arch/search/$1';
$route['(\d{1,4})'] = 'archive/$1';
$route['(\d{1,4})/(\d{1,2})'] = 'archive/$1/$2';
$route['tag/(:any)'] = 'archive/tag/$1';
$route['category/(:any)'] = 'archive/category/$1';
$route[ADMIN_DIR.'login'] = ADMIN_DIR.'arch/login';
$route[ADMIN_DIR.'logout'] = ADMIN_DIR.'arch/logout';
$route[ADMIN_DIR.'captcha'] = ADMIN_DIR.'arch/captcha';
$route[ADMIN_DIR.'options'] = ADMIN_DIR.'arch/options';
$route[ADMIN_DIR.'options/(:any)'] = ADMIN_DIR.'arch/options/$1';

$route['404_override'] = '';

if(file_exists(APPPATH . "cache/routes.php")){
    require_once APPPATH . "cache/routes.php";
}

/* End of file routes.php */
/* Location: ./application/config/routes.php */