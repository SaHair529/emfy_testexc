<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/functions.php';

const CLIENT_ID = 'dd92b0bb-4ab4-4d6c-bea0-24e6a6745e3c';
const CLIENT_SECRET = 'bHFqROqced2rA9gDDyxlXrEVTohR17c8uAop99c1sfBnOTcZEXGqGOUsgBrUuTss';
const REDIRECT_URI = 'https://webhook.site/84f5ff9b-3b2c-4815-a63f-600749438833';
const SUBDOMAIN = 'emfytestexc.kommo.com';


const PRODUCTS_CATALOG_ID = 49372;
