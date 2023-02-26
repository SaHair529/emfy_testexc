<?php
require_once __DIR__.'/configs.php';
use AmoCRM\Client\AmoCRMApiClient;
session_start();

$apiClient = new AmoCRMApiClient(CLIENT_ID, CLIENT_SECRET, REDIRECT_URI);

$apiClient->setAccountBaseDomain(SUBDOMAIN);
$code = '';
try {
    $accessToken = $apiClient->getOAuthClient()->getAccessTokenByCode($code);

    if (!$accessToken->hasExpired()) {
        saveToken([
            'access_token' => $accessToken->getToken(),
            'refresh_token' => $accessToken->getRefreshToken(),
            'expires' => $accessToken->getExpires(),
            'baseDomain' => $apiClient->getAccountBaseDomain(),
        ]);
    }
}
catch (Exception $e) {
    echo $e->getMessage();
    dd($_GET['code'], $e->getTrace());
}

$ownerDetails = $apiClient->getOAuthClient()->getResourceOwner($accessToken);
printf("Hello, %s!\n\n", $ownerDetails->getName());