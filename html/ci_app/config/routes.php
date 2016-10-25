<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'scwt';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['transport'] = 'scwt/transport';
$route['accommodation'] = 'scwt/accommodation';
$route['tours'] = 'scwt/tours';
