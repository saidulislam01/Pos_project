<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class JWTToken
{

    public static function CreateJWTToken($userEmail): string
    {
        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'laravel_JWT',
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'userEmail' => $userEmail
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
        public static function CreateJWTForResetPassword($userEmail): string
    {
        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'laravel_JWT',
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'userEmail' => $userEmail
        ];

        return JWT::encode($payload, $key, 'HS256');
    }


    public static function VarifyToken($token)
    {
        try {

            $key = env('JWT_KEY');

            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            return $decoded->userEmail;
        } catch (Exception $e) {
            return "Unauthorized";
        }
    }
}
