<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/functions.php';

const CLIENT_ID = '1a3557cf-8a39-4cae-b656-6b5c5db90855';
const CLIENT_SECRET = '6BKpVw0oH3xVNbXERyyS0YBf24nA8Au694TmxXTgPZrhgHigKUmi7BBkUgCTmbo3';
const REDIRECT_URI = 'https://webhook.site/84f5ff9b-3b2c-4815-a63f-600749438833';
const SUBDOMAIN = 'emfytestexc.kommo.com';
