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
$route['default_controller'] = 'portalcon/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// 
//$route['default_controller'] = 'portalcon/home';


$route['admin'] = 'admincon/admin';

$route['export_orders'] = '/download/export_orders';
$route['addp_get_Subcategory_by_categoryId']='/admincon/addp_get_Subcategory_by_categoryId';
$route['addp_get_type_by_SubcategoryId']='/admincon/addp_get_type_by_SubcategoryId';





$route['login'] = '/user/login';
$route['reset_pwd'] = '/user/reset_pwd';
$route['home'] = '/portalcon/index';
$route['signout'] = '/user/signout';
$route['account'] = '/admincon/account';
$route['register']='/user/register';
$route['forgot_password'] = '/admincon/forgot_password';
$route['reset_password'] = '/admincon/reset_password';
$route['change_password']='/user/change_password';

$route['addkurtis'] = '/admincon/addkurtis';
$route['submitaddkurtis']='admincon/submitaddkurtis';
$route['notification']='admincon/notification';
$route['get_Subcategory_by_categoryId']='/admincon/get_Subcategory_by_categoryId';
$route['productnumberautofill']='/admincon/productnumberautofill';
$route['get_type_by_SubcategoryId']='/admincon/get_type_by_SubcategoryId';

$route['manageorders'] = '/admincon/manageorders';


$route['manageuser'] = '/admincon/manageuser';
$route['addnewuser'] = '/admincon/addnewuser';

$route['managecategory'] = '/admincon/managecategory';
$route['addnewcategory'] = '/admincon/addnewcategory';

$route['managesubcat'] = '/admincon/managesubcategory';
$route['addnewsubcat'] = '/admincon/addnewsubcategory';

$route['managetype'] = '/admincon/managetype';
$route['addnewtype'] = '/admincon/addnewtype';

$route['addnewrelation']='admincon/addnewrelation';
$route['managerelation']='admincon/managerelation';

$route['managecolor'] = '/admincon/managecolor';
$route['addnewcolor'] = '/admincon/addnewcolor';

$route['managesize'] = '/admincon/managesize';
$route['addnewsize'] = '/admincon/addnewsize';


/* product pages */
$route['products'] = '/products/items';
$route['sub_items'] = '/products/sub_items';
$route['item_details'] = '/products/item_details';
$route['search'] = '/products/search';
$route['load_product'] = '/products/loadProduct_BasedOnPrice';
$route['load_color'] = '/products/load_color';


/* cart */
$route['view_cart_details'] = '/cart/view_cart_details1';
$route['addTocart'] = '/cart/addTocart';
$route['deleteItem'] = '/cart/deleteItem';
$route['place_order'] = '/cart/place_order';
$route['update_quantity'] = '/cart/update_quantity';

/* order pages */
$route['placeOrder'] = '/cart/place_order';
$route['buyItem'] = '/cart/buyItem';
$route['submitAddress'] = '/cart/deliveryAddress';
$route['contactUs'] = '/products/contactus';























