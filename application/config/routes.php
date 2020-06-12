<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default
//$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Shop
$route['shop'] = 'shop';

// Signup
$route['signup'] = 'signup';

// Login
$route['login'] = 'login';

// Shop as default
$route['default_controller'] = 'shop';

