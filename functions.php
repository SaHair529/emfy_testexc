<?php

use AmoCRM\OAuth2\Client\Provider\AmoCRM;
use League\OAuth2\Client\Grant\RefreshToken;
use League\OAuth2\Client\Token\AccessToken;

function saveToken($accessToken)
{
    if (
        isset($accessToken)
        && isset($accessToken['access_token'])
        && isset($accessToken['refresh_token'])
        && isset($accessToken['expires'])
        && isset($accessToken['baseDomain'])
    ) {
        $data = [
            'access_token' => $accessToken['access_token'],
            'expires' => $accessToken['expires'],
            'refresh_token' => $accessToken['refresh_token'],
            'baseDomain' => $accessToken['baseDomain'],
        ];

        file_put_contents(__DIR__.'/tokens.json', json_encode($data));
    } else {
        exit('Invalid access token ' . var_export($accessToken, true));
    }
}

function dismount($object) {

    $reflectionClass = new ReflectionClass(get_class($object));

    $array = array();

    foreach ($reflectionClass->getProperties() as $property) {

        $property->setAccessible(true);

        $array[$property->getName()] = $property->getValue($object);

        $property->setAccessible(false);

    }

    return $array;
}

function parseArrayObjectsToArr($objects)
{
    return array_map(function ($obj) {
        return dismount($obj);
    }, $objects);
}

function getTokenData()
{
    return json_decode(file_get_contents(__DIR__.'/tokens.json'), true);
}

/**
 * @return AccessToken|\League\OAuth2\Client\Token\AccessTokenInterface
 * @throws \League\OAuth2\Client\Provider\Exception\IdentityProviderException
 */
function getAccessToken()
{
    $provider = new AmoCRM([
        'clientId' => CLIENT_ID,
        'clientSecret' => CLIENT_SECRET,
        'redirectUri' => REDIRECT_URI
    ]);
    $provider->setBaseDomain(SUBDOMAIN);
    $token = getTokenData();
    $accessToken = new AccessToken(getTokenData());
    if (time() >= $token['expires']) {
        $accessToken = $provider->getAccessToken(new RefreshToken(), [
            'refresh_token' => $token['refresh_token']
        ]);
    }

    saveToken([
        'access_token' => $accessToken->getToken(),
        'refresh_token' => $accessToken->getRefreshToken(),
        'expires' => $accessToken->getExpires(),
        'baseDomain' => SUBDOMAIN,
    ]);

    return $accessToken;
}