<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
//$route['default_controller'] = 'admin/login';
$route['default_controller'] = 'Home';

/*============================= Website Routes Arabic ======================================================================*/


// $route['order/apply_promocode']                                 =  'frontend/order/apply_promocode';

// $route['/']                                 =  'Home/index';
// $route['ar/order/track/(:any)']                                 =  'frontend/order/track/$1';
// $route['ar']                                 =  'Home/index';
// $route['ar/purchase']                  =  "Home/purchase";
// $route['ar/cart']                      =  'Home/cart';
// //$route['ar/thank-you']                      =  'Home/thankYou';
// $route['ar/thank-you/(:any)']                      =  'Home/thankYou';
// $route['ar/privacy-policy']                      =  'Home/privacy';

// $route['ar/refund-policy']                      =  'Home/refund';
// $route['ar/terms-and-conditions']                      =  'Home/term_conditions';

/*////////////////// Website English Language///////////////////////////////////*/
// redirect('admin', 'admin/login');
$route['^(en|ar)']                                 =  'Home/index';
$route['^(en|ar)/about']                                 =  'Page/index/about';
$route['^(en|ar)/contact']                                 =  'Page/index/contact';
$route['^(en|ar)/privacy-policy']                                 =  'Page/index/privacy-policy';
$route['^(en|ar)/cart']                                 =  'Cart/index';
$route['^(en|ar)/products/(:any)']                                 =  'Products/index/$i';
$route['^(en|ar)/products']                                 =  'Products/index';

// $route['^(en|ar)/products/test/(:any)']                                 =  'Products/test/$i';

$route['^(en|ar)/product/(:any)']                                 =  'Products/details/$i';
$route['^(en|ar)/product-slug/(:any)']                                 =  'Products/prdoduct_by_slug';
$route['^(en|ar)/register']                                 =  'Auth/index';
$route['^(en|ar)/login']                                 =  'Auth/login_view';
$route['^(en|ar)/forgot-password']                                 =  'Auth/forgotPassword';
$route['^(en|ar)/change-password']                                 =  'Auth/ChangePassword';
//$route['^(en|ar)/resetpassword']                                 =  'Auth/resetPassword';
$route['^(en|ar)/new-password']                                 =  'Auth/newPassword';
$route['^(en|ar)/verifyUser']                                 =  'Auth/verifyUser';
$route['^(en|ar)/logout']                                 =  'Auth/user_logout';
$route['^(en|ar)/thankyou']                                 =  'Order/thankyou';
$route['^(en|ar)/checkout']                                 =  'Order/checkout';

$route['^(en|ar)/search(:any)']                                 =  'Products/search';

//User dashboard
$route['^(en|ar)/profile']                                 =  'User/index'; 
$route['^(en|ar)/reset-password']                                 =  'User/resetpassword';
$route['^(en|ar)/resestCustomerPass']                                 =  'User/resestCustomerPass';
$route['^(en|ar)/orders']                                 =  'Order/index';
$route['^(en|ar)/wishlist']                                 =  'User/wishlist';
$route['^(en|ar)/order/(:any)']                                 =  'Order/details';



// $route['^(en|ar)/reset-password']                                 =  'User/resetPassword';  
$route['myform/ajax/(:any)'] = 'Products/myformAjax/$1';

// $route['en/cart']                      =  'Home/cart'; 
// $route['en/products']                      =  'Home/products';
// $route['en/product-details/(:any)']       =  'Home/product_details';

// $route['en/order/track/(:any)']                                 =  'frontend/order/track/$1';

// $route['en/privacy-policy']                      =  'Home/privacy';
// $route['en/refund-policy']                      =  'Home/refund';

// $route['en/terms-and-conditions']                      =  'Home/term_conditions';

// $route['en/purchase']                  =  "Home/purchase"; 
// $route['en/thank-you/(:any)']                      =  'Home/thankYou';


// $route['paypal'] = 'paypal/index';
//   $route['checkout/(:any)'] = "paypal/checkout/$1";

/*========================= ADMIN Routes =========================================================================*/

$route['control-panel'] = 'admin/login';
// $route['admin/locations/countries'] = 'admin/countries';
// $route['admin/locations/states'] = 'admin/states';
// $route['admin/locations/cities'] = 'admin/cities';
// $route['admin/locations/cities/add'] = 'admin/cities/add';
// $route['admin/locations/cities/edit/(:any)'] = 'admin/cities/edit/$1';
// $route['admin/locations/cities/delete/(:any)'] = 'admin/cities/delete/$1';
$route['admin/logout'] = 'admin/login/logout';
$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;
