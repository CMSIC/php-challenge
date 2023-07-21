<?php

use Firebase\JWT\JWT;


function getBearerToken()
{
    $headers = getallheaders();
    if (isset($headers['Authorization'])) {
        if (preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
            return $matches[1];
        }
    }
    return null;
}


function jwt_verify($jwt)
{
    if (!$jwt) {
        throw new Exception('Token not provided');
    }

    try {
        $decoded = JWT::decode($jwt, '4d4m1t0l3', ['HS256']);
        return $decoded;
    } catch (\Exception $e) {
        throw new Exception('Invalid token');
    }
}