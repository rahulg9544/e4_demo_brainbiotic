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
$route['default_controller'] = 'BabiesController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Home'] = 'BabiesController';
$route['Dashboard'] = 'Adminlogin';
$route['About'] = 'BabiesController/about';
$route['Contact'] = 'BabiesController/contact';
$route['Faq'] = 'BabiesController/faq';
$route['Brands'] = 'BabiesController/Brand';
$route['Delivery-policy'] = 'BabiesController/deliverypolicy';
$route['Return-policy'] = 'BabiesController/returnpolicypage';
$route['Terms-of-sales'] = 'BabiesController/termsalespage';
$route['Comming-soon'] = 'BabiesController/commingsoon';
$route['Discount-offer'] = 'BabiesController/discountoffer';
$route['My-account'] = 'BabiesController/myaccount';
$route['Add-address'] = 'BabiesController/addaddress';
$route['Add-address-checkout'] = 'BabiesController/addaddress_check';
$route['Login-Register'] = 'BabiesController/loginreg';
$route['wishlist'] = 'BabiesController/wishlist';
$route['logout'] = 'BabiesController/logoutuser';
$route['Forgotpassword'] = 'BabiesController/forgotpassword';
$route['Cart'] = 'BabiesController/cart';
$route['Checkout'] = 'BabiesController/checkout';
$route['Newitems'] = 'BabiesController/newproducts';
$route['Orderdetails'] = 'BabiesController/orderdetails';
$route['updatepersonalinfo'] = 'BabiesController/update_personalinfo';
$route['Home_Ar'] = 'BabiesController_Ar';
$route['About_Ar'] = 'BabiesController_Ar/about';
$route['myaccount_Ar'] = 'BabiesController_Ar/myaccount';
$route['Login_Ar'] = 'BabiesController_Ar/login';
$route['wishlist_Ar'] = 'BabiesController_Ar/wishlist';
$route['logout_Ar'] = 'BabiesController_Ar/logoutuser';
$route['Cart_Ar'] = 'BabiesController_Ar/cart';
$route['Checkout_Ar'] = 'BabiesController_Ar/checkout';
$route['Newitems_Ar'] = 'BabiesController_Ar/newproducts';
$route['Orderdetails_Ar'] = 'BabiesController_Ar/orderdetails';
$route['updatepersonalinfo_Ar'] = 'BabiesController_Ar/update_personalinfo';



