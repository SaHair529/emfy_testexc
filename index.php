<?php

use AmoCRM\Client\AmoCRMApiClient;
use League\OAuth2\Client\Token\AccessToken;

require_once __DIR__.'/configs.php';

$apiClient = new AmoCRMApiClient(CLIENT_ID, CLIENT_SECRET, REDIRECT_URI);
$apiClient->setAccountBaseDomain(SUBDOMAIN);
$accessToken = new AccessToken(getTokenData());
$apiClient->setAccessToken($accessToken);

try {
    $leads = $apiClient->leads()->get();
}
catch (Exception $ex) {
    echo $ex->getMessage();
    dd($ex->getTrace());
}

dd($leads);