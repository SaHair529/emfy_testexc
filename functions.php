<?php

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

function getTokenData()
{
    return json_decode(file_get_contents(__DIR__.'/tokens.json'), true);
}