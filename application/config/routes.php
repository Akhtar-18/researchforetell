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
$route['default_controller'] = 'homepage';
$route['all-reports'] = 'homepage/AllReports';
$route['category/(:any)/(:any)'] = 'homepage/Categories';

$route['reports/(:any)/(:any)'] = 'homepage/SingleReport';
$route['reports1/(:any)/(:any)'] = 'homepage/SingleReport1';
$route['reports/(:any)/(:any)/discount'] = 'homepage/askfordiscount';
$route['reports/(:any)/(:any)/request'] = 'homepage/requestsample'; 
$route['reports/(:any)/(:any)/enquiry'] = 'homepage/enquirybeforebuying';  
$route['reports/(:any)/(:any)/discount1'] = 'homepage/askfordiscount1';
$route['reports/(:any)/(:any)/request1'] = 'homepage/requestsample1'; 
$route['reports/(:any)/(:any)/enquiry1'] = 'homepage/enquirybeforebuying1'; 
$route['contact-us'] = 'homepage/contactUs';
 
$route['report/purchase/(:any)'] = 'homepage/buynow';
$route['report/purchase1/(:any)'] = 'homepage/buynow1';
$route['purchase/(:any)'] = 'homepage/purchase/(:any)'; 
$route['payment_status/(:any)'] = 'homepage/payment_status/(:any)';
$route['page/(:any)'] = 'homepage/showpages';

$route['aboutus'] = 'homepage/aboutus';
$route['methodology'] = 'homepage/methodology';

$route['thankyou/enquiry'] = 'homepage/afdthanks';
$route['thankyou/request'] = 'homepage/rsthanks';
$route['thankyou/discount'] = 'homepage/ebbthanks';
$route['thankyou/enquiry1'] = 'homepage/afdthanks1';
$route['thankyou/request1'] = 'homepage/rsthanks1';
$route['thankyou/discount1'] = 'homepage/ebbthanks1';
$route['thankyou/payment'] = 'homepage/paymentThanks'; 
$route['testimonials'] = 'homepage/testimonials'; 
$route['careers'] = 'homepage/Careers'; 
$route['publisher'] = 'homepage/publishers'; 
$route['publisher/(:any)'] = 'homepage/publishers'; 
$route['publishers/(:num)'] = 'homepage/publishers'; 

$route['sitemap\.xml'] = "homepage/mainpage";
$route['pages.xml'] = "homepage/pages";
$route['reports.xml'] = "homepage/report"; 

$route['search'] = 'homepage/search';




$route['submit-form'] = 'homepage/submitForm';
$route['submit-form1'] = 'homepage/submitForm1';
$route['submit-buy-now'] = 'homepage/submitBuy'; 
 
$route['contact'] = 'homepage/contact';
$route['sitemap'] = 'homepage/sitemap';

$route['404_override'] = 'homepage/errorPage';
$route['page-not-found'] = 'homepage/errorPage';

$route['submit-form-contact-us'] = 'homepage/contactUsProceed';
$route['contact-thank-you'] = 'homepage/contactUsThankyou';

$route['translate_uri_dashes'] = FALSE;



$route['import'] = 'Excel/Import';
$route['now/upload'] = 'Excel/FinalUpload';